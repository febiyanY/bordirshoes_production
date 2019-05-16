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
        return view('logistik/req_mentah');
    }

    public function request_mentah(Request $req)
    {
        date_default_timezone_set("Asia/Bangkok");
        $tgl = date('d/m/Y'); 
        $data = array();
        $rdm = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZqwertyuiopasdfghjklzxcvbnm'),1,8);
        $det = date('d/m/Y/H/i/s');
        $aidi = $det.$rdm;
        foreach ($req['nama'] as $key => $val) {
            $jml= $req['jumlah'][$key];
            $data[] = array(
                'nama'=>$val,
                'jumlah'=>$jml,
                'tanggal'=>$tgl,
                'request_id'=>$aidi
            );
        }
        DB::table('req_beli_mentah')->insert($data);
        return redirect('/logistik/req_mentah');
        

    }

    public function stok_pendukung()
    {
        return view('logistik/stok_pendukung');
    }

    public function req_pendukung()
    {
        return view('logistik/req_pendukung');
    }

    public function request_pendukung(Request $req)
    {
        date_default_timezone_set("Asia/Bangkok");
        $tgl = date('d/m/Y'); 
        $data = array();
        $rdm = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZqwertyuiopasdfghjklzxcvbnm'),1,8);
        $det = date('d/m/Y/H/i/s');
        $aidi = $det.$rdm;
        foreach ($req['nama'] as $key => $val) {
            $jml= $req['jumlah'][$key];
            $data[] = array(
                'nama'=>$val,
                'jumlah'=>$jml,
                'tanggal'=>$tgl,
                'request_id'=>$aidi
            );
        }
        DB::table('req_beli_pendukung')->insert($data);
        return redirect('/logistik/req_pendukung');
        

    }

    public function stok_mentah()
    {
        return view('logistik/stok_mentah');
    }
}
