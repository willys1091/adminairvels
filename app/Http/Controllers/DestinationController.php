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
        $data['contentHeader']= "bc";
        $bc[]= array('title'=> 'Destination','url'=>'destination','active'=>'0');
        $bc[]= array('title'=> 'Create','url'=>'','active'=>'1');
        $data['bc'] = $bc;
        return view('destination.action',$data); 
    }

    public function store(Request $request){
        $hari = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
        for($x=0;$x<count($hari);$x++){
            if(isset($_REQUEST[$hari[$x]]) && $_REQUEST[$hari[$x]]==true){
                $info[] = [
                    'day' => $hari[$x],
                    'open' => $_REQUEST['open'.$hari[$x]],
                    'close' => $_REQUEST['close'.$hari[$x]],
                ];
            }
        }

        $data = new destination;
        $data->name = $request->name;
        $data->country_id = $request->country;
        $data->state = $request->state;
        $data->city = $request->city;
        $data->map = $request->maps;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->website = $request->website;
        $data->work_hour = serialize($info);
        $data->work_hour2 = json_encode($info);
        $data->currency = $request->currency;
        $data->price = $request->price;
        $data->create_date = date("Y-m-d H:i:s");
        $data->create_user = Session('id');
        $data->save();
        session::flash('error','success');
        session::flash('message','Add Destination Successfull');
        return redirect('destination');
        
       
        // echo "<pre>";
        // print_r($info);
        // echo "</pre>";
        // echo 
        // echo "<br>";
        // echo 
        // dd();

       
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
