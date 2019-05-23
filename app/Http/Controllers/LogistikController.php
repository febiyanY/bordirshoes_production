<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogistikController extends Controller
{
    public function dewasa()
    {
        return view('logistik/produk_dewasa');
    }

    public function cek_stok_produk()
    {
        $rs = DB::table('barang_produk')->select('stok')->where('ukuran', '>', 28)->get();
        return view('logistik/cek_stok_produk', ['product' => $rs]);
    }

    public function cek_stok_mentah()
    {
        $rs = DB::table('barang_mentah')->select('jumlah')->get();

        //add here..
        $act = DB::table('activity_mentah')->orderBy('activity_id','desc')->get();

        return view('logistik/cek_stok_mentah', ['mentah' => $rs,'act'=>$act]);
    }

    public function cek_stok_pendukung()
    {
        $rs = DB::table('barang_pendukung')->select('jumlah')->get();
        $act = DB::table('activity_pendukung')->orderBy('activity_id','desc')->get();
        return view('logistik/cek_stok_pendukung', ['pendukung' => $rs,'act'=>$act]);
    }

    public function req_mentah()
    {
        $rs = DB::table('req_beli_mentah')->where('status','belum')->orderBy('request_id', 'asc')->get();
        return view('logistik/req_mentah',['req'=>$rs]);
    }

    public function request_mentah(Request $req)
    {
        
        DB::table('req_beli_mentah')->where('request_id',$req['request_id'])->update(['status'=>'proses']);
        return redirect('/logistik/req_mentah');
    }

    public function stok_pendukung()
    {
        return view('logistik/stok_pendukung');
    }

    public function req_pendukung()
    {
        $rs = DB::table('req_beli_pendukung')->where('status','belum')->orderBy('request_id', 'asc')->get();
        return view('logistik/req_pendukung',['req'=>$rs]);
    }

    public function request_pendukung(Request $req)
    {
        DB::table('req_beli_pendukung')->where('request_id',$req['request_id'])->update(['status'=>'proses']);
        return redirect('/logistik/req_pendukung');
        

    }

    public function stok_mentah()
    {
        return view('logistik/stok_mentah');
    }


    public function readyPengirimanList(){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $this->url . 'api/logistik/list-ready-pengiriman')->getBody();
        $response = json_decode($response);

        return view('logistik.readyPengiriman', ['ready' => $response]);
    }

    public function readyPengirimanDetail($id){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $this->url . 'api/logistik/detail-ready-pengiriman/'.$id)->getBody();
        $response = json_decode($response);

        return view('logistik.readyDetail', ['detail' => $response]);
    }

    public function readyPengirimanSend(Request $req){
        $id = $req['idPemesanan'];
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', $this->url . 'api/logistik/send-ready-pengiriman',['json'=>['idPemesanan'=>$id]])->getBody();
        $response = json_decode($response);
        if($response->status=='success'){
            return redirect('logistik/ready');
        }else{
            return redirect()->back();
        }
    }





















    public function tes(){
        $client = new \GuzzleHttp\Client();
        $data = [
            'response'=>'kochenk',
            'hewan'=>'lucu',
            'detail'=>[
                'putih',
                'endut',
                'emez'
            ]
        ];
        $response = $client->request('POST', env('dila_url').'api/ambil/kochenk',['json'=>$data]);
        // $response = $client->request('POST', 'http://bordir.dila/api/ambil/');
        // $isi =  json_decode($response->getBody());
        // echo $isi->detail[0];
        echo $response->getBody();

    }



}
