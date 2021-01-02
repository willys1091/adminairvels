<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\destination;

class DestinationController extends Controller{
    use \App\Traits\General; 
    public function index(){
        $data['title'] = "Destination | Airvels";
        $data['subtitle'] = "List of Destination";
        $data['contentHeader'] = "btn";
        $data['btn'] = array('title' => 'Add Destination', 'url' => 'destination/create', 'icon' => 'fas fa-plus');
        $data['destination'] = destination::all();
        return view('destination.index',$data);
    }

    public function create(){
        $data['title'] = "Destination | Airvels";
        $data['action'] = "add";
        return view('destination.action',$data); 
    }

    public function store(Request $request){
        //
    }

    public function show($id){
        $data['title'] = "Destination | Airvels";
        $data['data'] = destination::findorfail($id);
        return view('destination.show',$data); 
    }

    public function edit($id){
        $data['title'] = "Destination | Airvels";
        $data['action'] = "edit";
        $data['data'] = destination::findorfail($id);
        return view('destination.action',$data); 
    }

    public function update(Request $request, $id){
        //
    }

    public function destroy($id){
        //
    }
}
