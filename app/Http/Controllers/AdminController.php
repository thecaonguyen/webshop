<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
    	return view('admin.dashboad');
    }

    public function login()
    {
    	return view('admin.login');
    }

    public function postLogin(Request $request)
    {
    	$email = $request->email;
    	$password = $request->password;

    	dd($email);
    }
}
