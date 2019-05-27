<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class PembelianController extends Controller
{
    //mentahh
    function req_mentah(Request $req){
        $data = array();
        $rs = DB::table('req_beli_mentah')->where('status','proses')->orderBy('request_id', 'asc')->get();

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

        $files = $req->file('bukti');
        $id = $req['request_id'];
        $tgl = $req['tanggal'];
        
        $data = array();
        $activity = array();
        $allowedfileExt=['jpg','png'];
        $check = 0;
        $pathList = array();
        if($files!=null){
            if(count($files)==count($req['nama'])){
                foreach($files as $file){
                    $ext = $file->getClientOriginalExtension();
                    if(!in_array($ext,$allowedfileExt)){
                        $check = 1;
                    }
                }
                if($check==0){
                    DB::table('req_beli_mentah')->where('request_id',$id)->delete();
                    foreach($files as $fl){
                        $path = $fl->store('public/image/bukti');
                        $pathList[] = str_replace('public','storage',$path);
                    }
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
                            'jenis'=>'masuk',
                            'bukti'=>$pathList[$key]
                        );
                        DB::table('barang_mentah')->where('nama', $name)->update(['jumlah' => DB::raw("jumlah + $jml")]);
                    }
                    DB::table('req_beli_mentah')->insert($data);
                    DB::table('activity_mentah')->insert($activity);
                    return redirect('/pembelian/done_mentah');
                    // return response()->json($activity);
        
                }else{
                    echo "<h1>Ekstensi file hanya boleh JPG dan PNG</h1>";
                }
            }else{
                echo "<h1>Lengkapi bukti pembayaran</h1>";
            }
        }else{
            // return redirect()->back()->withErrors(['salahhh']);
            echo "<h1>Lengkapi bukti pembayaran</h1>";
        } 
        
        
        

        
        



        
        
        
        



        
    }


    //Pendukung

    function req_pendukung(Request $req){
        $data = array();
        $rs = DB::table('req_beli_pendukung')->where('status','proses')->orderBy('request_id', 'asc')->get();

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
        $files = $req->file('bukti');
        $id = $req['request_id'];
        $tgl = $req['tanggal'];
        
        $data = array();
        $activity = array();
        $allowedfileExt=['jpg','png'];
        $check = 0;
        $pathList = array();
        if($files!=null){
            if(count($files)==count($req['nama'])){
                foreach($files as $file){
                    $ext = $file->getClientOriginalExtension();
                    if(!in_array($ext,$allowedfileExt)){
                        $check = 1;
                    }
                }
                if($check==0){
                    DB::table('req_beli_pendukung')->where('request_id',$id)->delete();
                    foreach($files as $fl){
                        $path = $fl->store('public/image/bukti');
                        $pathList[] = str_replace('public','storage',$path);
                    }
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
                            'jenis'=>'masuk',
                            'bukti'=>$pathList[$key]
                        );
                        DB::table('barang_mentah')->where('nama', $name)->update(['jumlah' => DB::raw("jumlah + $jml")]);
                    }
                    DB::table('req_beli_pendukung')->insert($data);
                    DB::table('activity_pendukung')->insert($activity);
                    return redirect('/pembelian/done_pendukung');
                    // return response()->json($activity);
        
                }else{
                    echo "<h1>Ekstensi file hanya boleh JPG dan PNG</h1>";
                }
            }else{
                echo "<h1>Lengkapi bukti pembayaran</h1>";
            }
        }else{
            // return redirect()->back()->withErrors(['salahhh']);
            echo "<h1>Lengkapi bkti pembayaran</h1>";
        } 
        
        // $id = $req['request_id'];
        // $tgl = $req['tanggal'];
        // DB::table('req_beli_pendukung')->where('request_id',$id)->delete();
        // $data = array();
        // foreach ($req['nama'] as $key => $val) {
        //     $jml= $req['jumlah'][$key];
        //     $ven= $req['vendor'][$key];
        //     $name = $req['nama'][$key];
        //     $price = $req['total'][$key];
        //     $data[] = array(
        //         'nama'=>$val,
        //         'jumlah'=>$jml,
        //         'tanggal'=>$tgl,
        //         'request_id'=>$id,
        //         'vendor'=>$ven,
        //         'status'=>'selesai',
        //         'total_harga'=>$price
        //     );
        //     $activity[] = array(
        //         'nama'=>$val,
        //         'jumlah'=>$jml,
        //         'tanggal'=>$tgl,
        //         'activity_id'=>$id,
        //         'jenis'=>'masuk'
        //     );
        //     DB::table('barang_pendukung')->where('nama', $name)->update(['jumlah' => DB::raw("jumlah + $jml")]);
        // }
        // DB::table('req_beli_pendukung')->insert($data);
        // DB::table('activity_pendukung')->insert($activity);
        // return redirect('/pembelian/done_pendukung');

        
    }
}
