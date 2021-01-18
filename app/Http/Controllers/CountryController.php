<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
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
        $data->currency = $request->currency;
        $data->img_background = $request->name.'.'.$request->backgroundext;
        $data->img_banner = $request->name.'.'.$request->bannerext;
        $data->desc_banner = $request->desc;
        $data->create_date = date("Y-m-d H:i:s");
        $data->create_user = Session('id');
        $data->save();
        storage::disk('ftp')->putFileAs('www/doc/img/banner/', asset('public/assets/media/banner/'.$request->bannerfilename) , $request->name.'.'.$request->bannerext);
        storage::disk('ftp')->putFileAs('www/doc/img/homepage/', asset('public/assets/media/background/'.$request->backgroundfilename) , $request->name.'.'.$request->backgroundext);
        storage::disk('public2')->delete('assets/media/banner/'.$request->bannerfilename);
        storage::disk('public2')->delete('assets/media/background/'.$request->backgroundfilename);
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
        $data->currency = $request->currency;
        $request->userfile <> "" ? $data->img_background = $request->name.'.'.$request->backgroundext : "";
        $request->userfile2 <> "" ? $data->img_banner = $request->name.'.'.$request->bannerext : "";
        $data->desc_banner = $request->desc;
        $data->update_date = date("Y-m-d H:i:s");
        $data->update_user = Session('id');
        $data->save();
        if($request->userfile <> ""){
            storage::disk('ftp')->putFileAs('www/doc/img/homepage/', asset('public/assets/media/background/'.$request->backgroundfilename) , $request->name.'.'.$request->backgroundext);
            storage::disk('public2')->delete('assets/media/background/'.$request->backgroundfilename);
        }

        if($request->userfile2 <> ""){
            storage::disk('ftp')->putFileAs('www/doc/img/banner/', asset('public/assets/media/banner/'.$request->bannerfilename) , $request->name.'.'.$request->bannerext);
            storage::disk('public2')->delete('assets/media/banner/'.$request->bannerfilename);
        }

        session::flash('error','success');
        session::flash('message','Edit Country Successfull');
        return redirect('country');
    }

    public function destroy($id){
        //
    }
}
