<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopController extends Controller
{
    //
    public function index(){

        $name = 'テーブル操作ページ';
        return view('welcomtech' ,['title' => $name]);
    }
}
