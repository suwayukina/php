<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
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
    $PersonData = Person::all();
    break;

    case 'Single':
    $id = $request['id'];
    $PersonData = Person::where('id',$id)->get(); 
    break;

    case 'Update':
    $PersonData = Person::find($request['id']);

    //更新データ
    $PersonData->id = $request['id'];
    $PersonData->name = $request['name'];
    $PersonData->age = $request['age'];
    $PersonData->phone = $request['phone'];
    $PersonData->usercd = $request['usercd'];
    $PersonData->usercd = $request['usercd'];

    $PersonData->save();
    break;

    case 'AddSingle':
    $PersonData = new Person();

    //新規データ
    $PersonData->id = $request['id'];
    $PersonData->name = $request['name'];
    $PersonData->age = $request['age'];
    $PersonData->phone = $request['phone'];
    $PersonData->usercd = $request['usercd'];
    $PersonData->usercd = $request['usercd'];

    $PersonData->save();
    break;

    //複数レコード更新【未実装】
    case 'UpdateMulti':
    //$PersonData= Person::all();::where('id',8)->get();
    break;

    //複数レコード追加【未実装】
    case 'AddMulti':
    //$PersonData= Person::all();::where('id',8)->get();
    break;

    //検索
    case 'Search':
    $PersonQuery = Person::query();
    $search_request_datas = json_decode( $request->search_data , true ) ;

    foreach($search_request_datas as $search_data)
    {
    if(strcmp($search_data['orand'], "or") == 0)
    {
    $PersonQuery = $PersonQuery->orWhere($search_data['column'],$search_data['sign'] ,$search_data['value']);
    }else{
    $PersonQuery = $PersonQuery->Where($search_data['column'],$search_data['sign'] ,$search_data['value']);
    }
    }
    $PersonData = $PersonQuery->get();
    break;

    //削除フラグ更新【未実装】
    case 'DelFlg':
    //$PersonData= Person::all();::where('id',8)->get();
    break;

    //削除【未実装】
    case 'Delete':
    //$PersonData= Person::all();::where('id',8)->get();
    break;

    default:
    $PersonData = Person::all();
    break;
    }
       return $PersonData;
    }
}
