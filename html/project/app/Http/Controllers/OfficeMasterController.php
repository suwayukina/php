<?php

namespace App\Http\Controllers;

use App\Models\OfficeMaster;
use Illuminate\Http\Request;

class OfficeMasterController extends Controller
{
/**
* Display a listing of the resource.
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function index(Request $request)
{
switch($request['axreq'])
{
case 'All':
$OfficeMasterData = OfficeMaster::all();
$name = '全件取得';
break;

case 'Single':
$id = $request['id'];
$OfficeMasterData = OfficeMaster::where('id',$id)->get(); 
$name = '指定レコード取得';
break;

case 'Update':

$noupdate = 0;
// 変更前のデータ
$id = $request['id'];
$oldOfficeMasterData = OfficeMaster::where('id',$id)->first(); 

$OfficeMasterData = OfficeMaster::find($request['id']);
if(isset($OfficeMasterData)){
// 更新データ
if(is_null($request['user_id'])){
    $OfficeMasterData->user_id = $oldOfficeMasterData->user_id;
    $noupdate += 1;
}else{
    $OfficeMasterData->user_id = $request['user_id'];
}

if(is_null($request['deploy_cd'])){
    $OfficeMasterData->deploy_cd = $oldOfficeMasterData->deploy_cd;
    $noupdate += 1;
}else{
    $OfficeMasterData->deploy_cd = $request['deploy_cd'];
}

if(is_null($request['assignmentdate'])){
    $OfficeMasterData->assignmentdate = $oldOfficeMasterData->assignmentdate;
    $noupdate += 1;
}else{
    $OfficeMasterData->assignmentdate = $request['assignmentdate'];
}
if(is_null($request['update_by'])){
    $OfficeMasterData->update_by = $oldOfficeMasterData->update_by;
    $noupdate += 1;
}else{
    $OfficeMasterData->update_by = $request['update_by'];
}

$result = $OfficeMasterData->save();
if($noupdate < 4 && $result){
    $name = '指定レコード更新';
}else{
    $name = '更新無し';
}

$OfficeMasterData = OfficeMaster::where('id',$id)->get(); 
}
else{
    $OfficeMasterData = OfficeMaster::all();
    $name = '更新無し　※idを正しく入力してください';
}
break;

case 'AddSingle':
$OfficeMasterData = new OfficeMaster();

//新規データ
$OfficeMasterData->id = $request['id'];
$OfficeMasterData->user_id = $request['user_id'];
$OfficeMasterData->deploy_cd = $request['deploy_cd'];
$OfficeMasterData->assignmentdate = $request['assignmentdate'];
$OfficeMasterData->update_by = $request['update_by'];

$OfficeMasterData->save();
$name = '新規レコード追加';

$OfficeMasterData = OfficeMaster::all();
$addsingle = true;
break;

//複数レコード更新【未実装】
case 'UpdateMulti':
//$OfficeMasterData= OfficeMaster::all();::where('id',8)->get();
break;

//複数レコード追加【未実装】
case 'AddMulti':
//$OfficeMasterData= OfficeMaster::all();::where('id',8)->get();
break;

//検索
case 'Search':
$OfficeMasterQuery = OfficeMaster::query();
$search_request_datas = json_decode( $request->search_data , true ) ;

foreach($search_request_datas as $search_data)
{
if(strcmp($search_data['orand'], "or") == 0)
{
$OfficeMasterQuery = $OfficeMasterQuery->orWhere($search_data['column'],$search_data['sign'] ,$search_data['value']);
}else{
$OfficeMasterQuery = $OfficeMasterQuery->Where($search_data['column'],$search_data['sign'] ,$search_data['value']);
}
}
$OfficeMasterData = $OfficeMasterQuery->get();
break;

//削除フラグ更新【未実装】
case 'DelFlg':
//$OfficeMasterData= OfficeMaster::all();::where('id',8)->get();
break;

//削除【未実装】
case 'Delete':
//$OfficeMasterData= OfficeMaster::all();::where('id',8)->get();
break;

default:
$OfficeMasterData = OfficeMaster::all();
break;
}
if(!isset($addsingle)){
    $addsingle = false;
}
$OfficeMasterDataall = OfficeMaster::all()->last(); 
$addsingle_id = $OfficeMasterDataall->id;
$addsingle_id += 1;
return view('welcomtech' ,['tabledata' => $OfficeMasterData,'title' => $name ,'addsingle' => $addsingle, 'addsingle_id' => $addsingle_id]);
}

}
