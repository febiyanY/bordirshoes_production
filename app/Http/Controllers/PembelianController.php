<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PembelianController extends Controller
{
    //mentahh
    function req_mentah(Request $req){
        $data = array();
        $rs = DB::table('req_beli_mentah')->where('status','belum')->orderBy('request_id', 'asc')->get();

    	return view('pembelian/req_mentah',['req'=>$rs]);
    }

    function done_mentah(Request $req){
        $rs = DB::table('req_beli_mentah')->where('status','terkonfirmasi')->get();

    	return view('pembelian/done_mentah',['req'=>$rs]);
    }

    function proses_req_mentah(Request $req){
    
        $rs = DB::table('req_beli_mentah')->where('request_id',$req['request_id'])->get();
        $tgl = $rs[0]->tanggal;
        $id = $rs[0]->request_id;
    	return view('pembelian/proses_req_mentah',['req'=>$rs,'tgl'=>$tgl,'id'=>$id]);
    }

    function proses_done_mentah(Request $req){
        
        $rs = DB::table('req_beli_mentah')->where('request_id',$req['request_id'])->get();
        $tgl = $rs[0]->tanggal;
        $id = $rs[0]->request_id;
    	return view('pembelian/proses_done_mentah',['req'=>$rs,'tgl'=>$tgl,'id'=>$id]);
    }

    function konfirmasi_req_mentah(Request $req){
        $id = $req['request_id'];
        $tgl = $req['tanggal'];
        DB::table('req_beli_mentah')->where('request_id',$id)->delete();
        $data = array();
        foreach ($req['nama'] as $key => $val) {
            $jml= $req['jumlah'][$key];
            $ven= $req['vendor'][$key];
            $name = $req['nama'][$key];
            $data[] = array(
                'nama'=>$val,
                'jumlah'=>$jml,
                'tanggal'=>$tgl,
                'request_id'=>$id,
                'vendor'=>$ven,
                'status'=>'terkonfirmasi'
            );
            // DB::table('barang_mentah')->where('nama', $name)->update(['jumlah' => DB::raw("jumlah + $jml")]);
        }
        DB::table('req_beli_mentah')->insert($data);
        return redirect('/pembelian/req_mentah');
    	// return view('pembelian/req_mentah');
    }

    public function konfirmasi_done_mentah(Request $req){
        $id = $req['request_id'];
        $tgl = $req['tanggal'];
        DB::table('req_beli_mentah')->where('request_id',$id)->delete();
        $data = array();
        $activity = array();
        foreach ($req['nama'] as $key => $val) {
            $jml= $req['jumlah'][$key];
            $ven= $req['vendor'][$key];
            $name = $req['nama'][$key];
            $price = $req['total'][$key];
            $data[] = array(
                'nama'=>$val,
                'jumlah'=>$jml,
                'tanggal'=>$tgl,
                'request_id'=>$id,
                'vendor'=>$ven,
                'status'=>'selesai',
                'total_harga'=>$price
            );
            $activity[] = array(
                'nama'=>$val,
                'jumlah'=>$jml,
                'tanggal'=>$tgl,
                'activity_id'=>$id,
                'jenis'=>'masuk'
            );
            DB::table('barang_mentah')->where('nama', $name)->update(['jumlah' => DB::raw("jumlah + $jml")]);
        }
        DB::table('req_beli_mentah')->insert($data);
        DB::table('activity_mentah')->insert($activity);
        return redirect('/pembelian/done_mentah');

        
    }


    //Pendukung

    function req_pendukung(Request $req){
        $data = array();
        $rs = DB::table('req_beli_pendukung')->where('status','belum')->orderBy('request_id', 'asc')->get();

    	return view('pembelian/req_pendukung',['req'=>$rs]);
    }

    function done_pendukung(Request $req){
        $rs = DB::table('req_beli_pendukung')->where('status','terkonfirmasi')->get();

    	return view('pembelian/done_pendukung',['req'=>$rs]);
    }

    function proses_req_pendukung(Request $req){
    
        $rs = DB::table('req_beli_pendukung')->where('request_id',$req['request_id'])->get();
        $tgl = $rs[0]->tanggal;
        $id = $rs[0]->request_id;
    	return view('pembelian/proses_req_pendukung',['req'=>$rs,'tgl'=>$tgl,'id'=>$id]);
    }

    function proses_done_pendukung(Request $req){
        
        $rs = DB::table('req_beli_pendukung')->where('request_id',$req['request_id'])->get();
        $tgl = $rs[0]->tanggal;
        $id = $rs[0]->request_id;
    	return view('pembelian/proses_done_pendukung',['req'=>$rs,'tgl'=>$tgl,'id'=>$id]);
    }

    function konfirmasi_req_pendukung(Request $req){
        $id = $req['request_id'];
        $tgl = $req['tanggal'];
        DB::table('req_beli_pendukung')->where('request_id',$id)->delete();
        $data = array();
        foreach ($req['nama'] as $key => $val) {
            $jml= $req['jumlah'][$key];
            $ven= $req['vendor'][$key];
            $name = $req['nama'][$key];
            $data[] = array(
                'nama'=>$val,
                'jumlah'=>$jml,
                'tanggal'=>$tgl,
                'request_id'=>$id,
                'vendor'=>$ven,
                'status'=>'terkonfirmasi'
            );
            // DB::table('barang_mentah')->where('nama', $name)->update(['jumlah' => DB::raw("jumlah + $jml")]);
        }
        DB::table('req_beli_pendukung')->insert($data);
        return redirect('/pembelian/req_pendukung');
    	// return view('pembelian/req_mentah');
    }

    public function konfirmasi_done_pendukung(Request $req){
        $id = $req['request_id'];
        $tgl = $req['tanggal'];
        DB::table('req_beli_pendukung')->where('request_id',$id)->delete();
        $data = array();
        foreach ($req['nama'] as $key => $val) {
            $jml= $req['jumlah'][$key];
            $ven= $req['vendor'][$key];
            $name = $req['nama'][$key];
            $price = $req['total'][$key];
            $data[] = array(
                'nama'=>$val,
                'jumlah'=>$jml,
                'tanggal'=>$tgl,
                'request_id'=>$id,
                'vendor'=>$ven,
                'status'=>'selesai',
                'total_harga'=>$price
            );
            $activity[] = array(
                'nama'=>$val,
                'jumlah'=>$jml,
                'tanggal'=>$tgl,
                'activity_id'=>$id,
                'jenis'=>'masuk'
            );
            DB::table('barang_pendukung')->where('nama', $name)->update(['jumlah' => DB::raw("jumlah + $jml")]);
        }
        DB::table('req_beli_pendukung')->insert($data);
        DB::table('activity_pendukung')->insert($activity);
        return redirect('/pembelian/done_pendukung');

        
    }
}
