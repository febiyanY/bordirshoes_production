<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
    public function index(Request $req){
    	$username = $req['username'];
    	$password = $req['password'];
    	if($username == 'pembelian' && $password == 'admin'){
    		return redirect()->route('pembelian');
    	}elseif($username == 'logistik' && $password == 'admin'){
    		return redirect()->route('logistik');
    	}else{
			return redirect('login');
		}
    }
}
