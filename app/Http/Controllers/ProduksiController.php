<?php

namespace App\Http\Controllers;

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

}
