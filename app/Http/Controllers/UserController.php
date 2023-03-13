<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function home(){
        return view('client.home');
    }
}
