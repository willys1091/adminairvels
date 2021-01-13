<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\destination;
use App\Models\country;

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
        $data['country'] = country::where('active','1')->get();
        return view('destination.action',$data); 
    }

    public function store(Request $request){
        $data = new destination;
        $data->name = $request->name;
        // $data->country_id = $request->;
        // $data->state = $request->;
        // $data->city = $request->;
        // $data->map = $request->;
        // $data->address = $request->;
        // $data->phone = $request->;
        // $data->website = $request->;
        // $data->work_hour = $request->;
        // $data->currency = $request->;
        // $data->price = $request->;
        $data->create_date = date("Y-m-d H:i:s");
        $data->create_user = Session('id');
        $data->save();
        session::flash('error','success');
        session::flash('message','Add Destination Successfull');
        return redirect('destination');
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
        $data = destination::findorfail($id);
        $data->name = $request->name;
        // $data->country_id = $request->;
        // $data->state = $request->;
        // $data->city = $request->;
        // $data->map = $request->;
        // $data->address = $request->;
        // $data->phone = $request->;
        // $data->website = $request->;
        // $data->work_hour = $request->;
        // $data->currency = $request->;
        // $data->price = $request->;
        $data->create_date = date("Y-m-d H:i:s");
        $data->create_user = Session('id');
        $data->save();
        session::flash('error','success');
        session::flash('message','Edit Destination Successfull');
        return redirect('destination');
    }

    public function destroy($id){
        //
    }
}
