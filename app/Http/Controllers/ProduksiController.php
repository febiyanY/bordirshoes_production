<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProduksiController extends Controller
{
    //
    public function index()
    {

        return view('produksi.penjadwalan');
    }

    public function produksiReportIndex()
    {
        return view('produksi.produksiReport');
    }

    public function rencanaIndex()
    {
        return view('produksi.rencana');
    }

    public function requestList()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $this->url . 'api/produksi/getorders')->getBody();
        $response = json_decode($response);
        return view('produksi.requestList', ['orders' => $response]);

    }

    public function requestDetail($id)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $this->url . 'api/produksi/order/detail/' . $id)->getBody();
        $response = json_decode($response);
        $nama = array();
        $ukuran = array();

        //masukin data nama sama ukuran sepatu
        foreach ($response as $rs) {
            $nama[] = $rs->category;
            $ukuran[] = $rs->size;
        }

        // ngambil data stock berdasarkan nama dan ukuran sepatu
        $sql = "SELECT beldru,satin,benang,lem,sol,taiwan FROM barang_produk where (nama,ukuran) in (";

        for ($x = 0; $x < count($nama); $x++) {
            $sql .= "('$nama[$x]',$ukuran[$x]),";
        }
        $sql = substr($sql, 0, -1);
        $sql .= ") order by nama asc, ukuran asc";
        $re = DB::select($sql);
        // echo json_encode($re);
        // echo $sql;

        //Masukin bahan kebutuhan ke array
        $bahanRequest = array();
        foreach ($re as $rw) {
            $bahanRequest[] = array(
                $rw->beldru,
                $rw->satin,
                $rw->benang,
                $rw->lem,
                $rw->sol,
                $rw->taiwan,
            );
        }
        // print_r($bahanRequest);

        //masukin data kebutuhan stock ke array
        $stk = DB::select("
        select
(select jumlah from bordirut.barang_mentah where nama='Kain satin sutra') as satin,
(select jumlah from bordirut.barang_mentah where nama='Kain beldru') as beldru,
(select jumlah from bordirut.barang_mentah where nama='Benang bordir') as benang,
(select jumlah from bordirut.barang_pendukung where nama='lem') as lem,
(select jumlah from bordirut.barang_mentah where nama='Sol karet sepatu') as sol,
(select jumlah from bordirut.barang_mentah where nama='Kain lapis dalam taiwan') as taiwan
        ");

        $stock = array();
        foreach ($stk as $rw) {
            $stock[] = $rw->beldru;
            $stock[] = $rw->satin;
            $stock[] = $rw->benang;
            $stock[] = $rw->lem;
            $stock[] = $rw->sol;
            $stock[] = $rw->taiwan;
        }

        //BIKIN ARRAY UNYUK DISPLAY STOCK DI VIEW
        $display = array();
        foreach ($response as $key => $rw) {
            $display[] = array(
                'nama' => $rw->productName,
                'ukuran' => $rw->size,
                'jumlah' => $rw->quantity,
                'beldru' => $bahanRequest[$key][0] * $rw->quantity,
                'satin' => $bahanRequest[$key][1] * $rw->quantity,
                'benang' => $bahanRequest[$key][2] * $rw->quantity,
                'lem' => $bahanRequest[$key][3] * $rw->quantity,
                'sol' => $bahanRequest[$key][4] * $rw->quantity,
                'taiwan' => $bahanRequest[$key][5] * $rw->quantity,
            );
        }
        // print_r($display);
        // print_r($stock);

        //PENGURANGAN STOCK DENGAN BAHAN YANG DI REQUEST
        foreach ($bahanRequest as $butuh) {
            for ($x = 0; $x < 6; $x++) {
                $stock[$x] -= $butuh[$x];
            }
        }
        // print_r($stock);

        return view('produksi.requestDetail', ['detail' => $response, 'stock' => $stock, 'display' => $display]);
    }

    public function sendToLogistic(Request $req)
    {
        date_default_timezone_set("Asia/Bangkok");
        $tgl = date('d/m/Y');
        $req_mentah = array();
        $req_pendukung = array();
        $rdm = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZqwertyuiopasdfghjklzxcvbnm'), 1, 8);
        $det = date('dmYHis');
        $aidi = $req['idPemesanan'];
        $ada_mentah = 0;
        $ada_pendukung = 0;

        $data_mentah = array('Kain satin sutra', 'Kain lapis dalam taiwan', 'Kain beldru', 'Benang bordir', 'Benang sulam', 'Sol karet sepatu');
        $data_pendukung = array('lem', 'gunting', 'jarum', 'kantong plastik', 'kardus', 'rol meteran');

        foreach ($req['nama'] as $key => $val) {
            $jml = $req['jumlah'][$key];
            if ($jml != 0) {
                if (in_array($val, $data_mentah)) {
                    $ada_mentah = 1;
                    $req_mentah[] = array(
                        'nama' => $val,
                        'jumlah' => $jml,
                        'tanggal' => $tgl,
                        'request_id' => $aidi,
                    );
                } else {
                    $ada_pendukung = 1;
                    $req_pendukung[] = array(
                        'nama' => $val,
                        'jumlah' => $jml,
                        'tanggal' => $tgl,
                        'request_id' => $aidi,
                    );
                }

            }

        }

        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $this->url . 'api/produksi/order/update-wait/' . $req['idPemesanan'])->getBody();
        $response = json_decode($response);

        if ($response->status == 'success') {
            if ($ada_mentah == 1) {
                DB::table('req_beli_mentah')->insert($req_mentah);
            }
            if ($ada_pendukung == 1) {
                DB::table('req_beli_pendukung')->insert($req_pendukung);
            }
            return redirect('/produksi/request');
        }

        // print_r($req_mentah);
        // print_r($req_pendukung);
    }

    public function readyList()
    {
        $barangSelesai = array();

        $done = DB::select("select req_beli_mentah.request_id as mentah
        from req_beli_mentah
        inner join req_beli_pendukung
        ON req_beli_mentah.request_id = req_beli_pendukung.request_id
        where req_beli_mentah.status = 'selesai'
        group by mentah
        order by mentah desc;");

        foreach ($done as $dn) {
            $barangSelesai[] = $dn->mentah;
        }

        // echo $barangSelesai;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', $this->url . 'api/produksi/order/list-proses-pembuatan', ['json' => ['list' => $barangSelesai]])->getBody();
        $response = json_decode($response);
        // echo $response;
        return view('produksi.readyList', ['ready' => $response]);

    }

    public function readyDetail($id)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $this->url . 'api/produksi/order/detail/' . $id)->getBody();
        $response = json_decode($response);
        $nama = array();
        $ukuran = array();

        //masukin data nama sama ukuran sepatu
        foreach ($response as $rs) {
            $nama[] = $rs->category;
            $ukuran[] = $rs->size;
        }

        // ngambil data stock berdasarkan nama dan ukuran sepatu
        $sql = "SELECT beldru,satin,benang,lem,sol,taiwan FROM barang_produk where (nama,ukuran) in (";

        for ($x = 0; $x < count($nama); $x++) {
            $sql .= "('$nama[$x]',$ukuran[$x]),";
        }
        $sql = substr($sql, 0, -1);
        $sql .= ") order by nama asc, ukuran asc";
        $re = DB::select($sql);
        // echo json_encode($re);
        // echo $sql;

        //Masukin bahan kebutuhan ke array
        $bahanRequest = array();
        foreach ($re as $rw) {
            $bahanRequest[] = array(
                $rw->beldru,
                $rw->satin,
                $rw->benang,
                $rw->lem,
                $rw->sol,
                $rw->taiwan,
            );
        }
        // print_r($bahanRequest);

        //BIKIN ARRAY UNYUK DISPLAY STOCK DI VIEW
        $display = array();
        foreach ($response as $key => $rw) {
            $display[] = array(
                'nama' => $rw->productName,
                'ukuran' => $rw->size,
                'jumlah' => $rw->quantity,
                'beldru' => $bahanRequest[$key][0] * $rw->quantity,
                'satin' => $bahanRequest[$key][1] * $rw->quantity,
                'benang' => $bahanRequest[$key][2] * $rw->quantity,
                'lem' => $bahanRequest[$key][3] * $rw->quantity,
                'sol' => $bahanRequest[$key][4] * $rw->quantity,
                'taiwan' => $bahanRequest[$key][5] * $rw->quantity,
            );
        }
        // print_r($display);
        // print_r($stock);

        return view('produksi.readyDetail', ['detail' => $response, 'display' => $display]);

    }


    public function sendReadyToLogistic(Request $req){
        $id = $req['idPemesanan'];
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $this->url . 'api/produksi/order/update-done/' . $id)->getBody();
        $response = json_decode($response);
        // echo $response;
        if($response->status=='success'){
            return redirect('produksi/ready');
        }else{
            return redirect()->back();
        }
    }

    public function inProductionList(){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $this->url . 'api/produksi/in-production-list')->getBody();
        $response = json_decode($response);

        return view('produksi.inProductionList',['product'=>$response]);
    }

    public function doneProduction($id){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $this->url . 'api/produksi/done/confirm/'.$id)->getBody();
        $response = json_decode($response);

        return redirect('produksi/list-dalam-produksi');
    }














    public function coba()
    {
        $nama = ['bordir', 'sulam', 'bordir', 'bordir'];
        $ukuran = [41, 40, 38, 37];

        $sql = "SELECT * FROM barang_produk where (nama,ukuran) in (";

        for ($x = 0; $x < count($nama); $x++) {
            $sql .= "('$nama[$x]',$ukuran[$x]),";
        }
        $sql = substr($sql, 0, -1);
        $sql .= ") order by nama asc, ukuran asc";
        // echo $sql;
        $rs = DB::select($sql);
        return response()->json($rs);
    }

}
