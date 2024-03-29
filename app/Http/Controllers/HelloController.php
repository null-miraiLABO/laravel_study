<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{
    public function index() {
        $data = [
            'one','two','three','four'
        ];
        
        return view('hello.index',['data'=>$data]);
    }

    public function hello(Request $request)
    {
        $data = [
            'msg'=>$request->msg
        ];
        return view('hello.index',$data);
    }
}