<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $req)
    {
        $username = $req['username'];
        $password = $req['password'];
        if ($username == 'pembelian' && $password == 'admin') {
            return redirect()->route('pembelian');
        } else if ($username == 'logistik' && $password == 'admin') {
            return redirect()->route('logistik');
        } else if ($username == 'produksi' && $password == 'admin') {
            return redirect()->route('produksi');
        } else {
            return redirect('login');
        }
    }
}
