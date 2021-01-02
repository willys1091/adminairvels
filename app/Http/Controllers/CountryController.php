<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\country;

class CountryController extends Controller{   
    use \App\Traits\General; 
    public function index(){
        $data['title'] = "Country | Airvels";
        $data['subtitle'] = "List of Country";
        $data['contentHeader'] = "mdl";
        $data['btn'] = array('title' => 'Add Country', 'url' => 'country/create', 'icon' => 'fas fa-plus');
        $data['country'] = country::all();
        return view('country.index',$data);
    }

    public function create(){
        $data['title'] = "Country | Airvels";
        $data['action'] = "add";
        return view('country.action',$data); 
    }

    public function store(Request $request){
        $data = new country;
        $data->name = $request->name;
        // $data->img_background = ;
        // $data->img_banner = ;
        $data->desc_banner = $request->desc;
        $data->create_date = date("Y-m-d H:i:s");
        $data->create_user = Session('id');
        $data->save();
        session::flash('error','success');
        session::flash('message','Add Country Successfull');
        return redirect('country');
    }

    public function show($id){
        //
    }

    public function edit($id){
        $data['title'] = "Country | Airvels";
        $data['action'] = "edit";
        $data['data'] = country::findorfail($id);
        return view('country.action',$data); 
    }

    public function update(Request $request, $id){
        $data = country::findorfail($id);
        $data->name = $request->name;
        // $data->img_background = ;
        // $data->img_banner = ;
        $data->desc_banner = $request->desc;
        $data->create_date = date("Y-m-d H:i:s");
        $data->create_user = Session('id');
        $data->save();
        session::flash('error','success');
        session::flash('message','Edit Country Successfull');
        return redirect('country');
    }

    public function destroy($id){
        //
    }
}
