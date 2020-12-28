<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\user;
use App\Models\role;

class PeopleController extends Controller{
    public function index($modul){
        $data['title'] = ucfirst($modul)." | Airvels";
        $data['modul'] = $modul;
        $data['people'] = $modul=='admin'?admin::all():user::all();
        return view('people.index',$data);
    }

    public function create(){
        //
    }

    public function store(Request $request){
        //
    }

    public function show($id){
        //
    }

    public function edit($id){
        //
    }

    public function update(Request $request, $id){
        //
    }

    public function destroy($id){
        //
    }
}
