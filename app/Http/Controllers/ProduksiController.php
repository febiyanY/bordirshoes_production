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
        $sql = "SELECT satin,beldru,benang,lem,sol,taiwan FROM barang_produk where (nama,ukuran) in (";

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
                $rw->satin,
                $rw->beldru,
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
            $stock[] = $rw->satin;
            $stock[] = $rw->beldru;
            $stock[] = $rw->benang;
            $stock[] = $rw->lem;
            $stock[] = $rw->sol;
            $stock[] = $rw->taiwan;
        }

        //BIKIN ARRAY UNYUK DISPLAY STOCK DI VIEW
        $display = array();
        foreach ($response as $key=>$rw) {
            $display[] = array(
                'nama'=>$rw->productName,
                'ukuran'=>$rw->size,
                'jumlah'=>$rw->quantity,
                'satin'=>$bahanRequest[$key][0] * $rw->quantity,
                'beldru'=>$bahanRequest[$key][1] * $rw->quantity,
                'benang'=>$bahanRequest[$key][2] * $rw->quantity,
                'lem'=>$bahanRequest[$key][3] * $rw->quantity,
                'sol'=>$bahanRequest[$key][4] * $rw->quantity,
                'taiwan'=>$bahanRequest[$key][5] * $rw->quantity,
            );
        }
        // print_r($display);
        // print_r($stock);

        //PENGURANGAN STOCK DENGAN BAHAN YANG DI REQUEST
        foreach($bahanRequest as $butuh){
            for($x=0;$x<6;$x++){
                $stock[$x]-=$butuh[$x];
            }
        }
        // print_r($stock);

        return view('produksi.requestDetail',['detail'=>$response,'stock'=>$stock,'display'=>$display]);
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
