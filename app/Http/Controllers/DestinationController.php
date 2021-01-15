<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\destination;

class DestinationController extends Controller{
    use \App\Traits\General; 
    private $hari = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];

    public function index(){
        $data['title'] = "Destination | Airvels";
        $data['subtitle'] = "List of Destination";
        $data['contentHeader'] = "btn";
        $data['btn'] = array('title' => 'Add Destination', 'url' => 'destination/create', 'icon' => 'fas fa-plus');
        $data['destination'] = destination::all();

        $des = destination::where('work_hour2',null)->get();
        $x = 0;
        foreach($des as $d){
                if($x<1000){
                    if($d->work_hour<>''){
                        // echo $d->id;
                        // echo $d->work_hour;
                        // echo "<br>";
                        // echo "<br>";
                $wh = unserialize($d->work_hour);

                foreach($wh as $w){
                    $wh2[$w['day']]['open'] = $w['open'];
                    $wh2[$w['day']]['close'] = $w['close'];
                }
                $dess = destination::findorfail($d->id);
                $dess->work_hour2 = json_encode($wh2);
                $dess->save();
                $x++;
                }
            }
        }
       // return view('destination.index',$data);
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
        foreach($this->hari as $h){
            if(isset($_REQUEST[$h]) && $_REQUEST[$h]==true){
                $info[$h]['open'] = $_REQUEST['open'.$h];
                $info[$h]['close'] = $_REQUEST['close'.$h];

                //will be delete soon 
                    $info2[] = [
                        'day' => $h,
                        'open' => $_REQUEST['open'.$h],
                        'close' => $_REQUEST['close'.$h],
                    ];
                //will be delete soon
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
        $data->work_hour = serialize($info2);
        $data->work_hour2 = json_encode($info);
        $data->currency = $request->currency;
        $data->price = $request->price;
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
        $destination = destination::findorfail($id);
        $data['data'] = $destination;
        $data['contentHeader']= "bc";
        $bc[]= array('title'=> 'Destination','url'=>'destination','active'=>'0');
        $bc[]= array('title'=> $destination->name,'url'=>'','active'=>'1');
        $data['bc'] = $bc;
        return view('destination.action',$data); 
    }

    public function update(Request $request, $id){
        foreach($this->hari as $h){
            if(isset($_REQUEST[$h]) && $_REQUEST[$h]==true){
                $info[$h]['open'] = $_REQUEST['open'.$h];
                $info[$h]['close'] = $_REQUEST['close'.$h];

                //will be delete soon 
                    $info2[] = [
                        'day' => $h,
                        'open' => $_REQUEST['open'.$h],
                        'close' => $_REQUEST['close'.$h],
                    ];
                //will be delete soon
            }
        }
        $data = destination::findorfail($id);
        $data->name = $request->name;
        $data->country_id = $request->country;
        $data->state = $request->state;
        $data->city = $request->city;
        $data->map = $request->maps;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->website = $request->website;
        $data->work_hour = serialize($info2);
        $data->work_hour2 = json_encode($info);
        $data->currency = $request->currency;
        $data->price = $request->price;
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
