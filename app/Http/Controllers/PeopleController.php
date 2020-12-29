<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\admin;
use App\Models\user;
use App\Models\role;

class PeopleController extends Controller{
    public function index($modul){
        $data['title'] = ucfirst($modul)." | Airvels";
        $data['modul'] = $modul;
        if($modul=='admin'){
            $data['contentHeader'] = "mdl";
            $data['btn'] = array('title' => 'Add '.$modul, 'url' => 'people/'.$modul.'/create', 'icon' => 'fas fa-plus');
        }else{
            $data['contentHeader']= "bc";
            $bc[]= array('title'=> 'People','url'=>'','active'=>'1');
            $bc[]= array('title'=> $modul,'url'=>'','active'=>'1');
            $data['bc'] = $bc;
        }
        $data['people'] = $modul=='admin'?admin::all():user::all();
        return view('people.index',$data);
    }

    public function create($modul){
        $data['title'] = ucfirst($modul)." | Airvels";
        $data['action'] = "add";
        $data['modul'] = $modul;
        $modul=='admin'?$data['role'] = role::where('type',$modul)->get() : '';
        return view('people.action',$data); 
    }

    public function store(Request $request){
        if($request->modul=='admin'){
            $data = new admin;
            $data->roleid = $request->role;
            $data->type = $request->admin==1?'admin':'user';
            $data->title = $request->title;
            $data->email = $request->email;
            $data->name = $request->name;
            $data->password = md5($request->password);
            $data->active = '1';
        }else{
            // $data = new user;
            // $data-> = $request->;
            // $data-> = $request->;
            // $data-> = $request->;
            // $data-> = $request->;
            // $data-> = $request->;
            // $data-> = $request->;

        }
        $data->create_date = date("Y-m-d H:i:s");
        $data->create_user = Session('id');
        $data->save();
        session::flash('error','success');
        session::flash('message','Add '.$request->modul.' Successfull');
        return redirect('people/'.$request->modul);
    }

    public function show($id){
        //
    }

    public function edit($modul,$id){
        $data['title'] = ucfirst($modul)." | Airvels";
        $data['action'] = "edit";
        $data['modul'] = $modul;
        $modul=='admin'?$data['role'] = role::where('type',$modul)->get() : '';
        $data['data'] = $modul=='admin'?admin::findorfail($id):user::findorfail($id);
        return view('people.action',$data); 
    }

    public function update(Request $request, $id){
        if($request->modul=='admin'){
            $data = admin::findorfail($id);
            $data->roleid = $request->role;
            $data->type = $request->admin==1?'admin':'user';
            $data->title = $request->title;
            $data->email = $request->email;
            $data->name = $request->name;
            $data->password = md5($request->password);
            $data->active = '1';
        }else{
            
        }
        $data->update_date = date("Y-m-d H:i:s");
        $data->update_user = Session('id');
        $data->save();
        session::flash('error','success');
        session::flash('message','Edited '.$request->modul.' Successfull');
        return redirect('people/'.$request->modul);
    }

    public function destroy($id){
        //
    }
}
