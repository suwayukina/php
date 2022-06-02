<?php

namespace App\Http\Controllers;

use App\Models\OfficeMaster;
use Illuminate\Http\Request;

class TopController extends Controller
{
    //
    public function index(){

        $name = 'テーブル操作ページ';
        $OfficeMasterDataall = OfficeMaster::all()->last(); 
        $addsingle_id = $OfficeMasterDataall->id;
        $addsingle_id ++;
        return view('welcomtech' ,['title' => $name, 'addsingle_id' =>  $addsingle_id]);
    }
}
