<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\post_category;

class CategoryController extends Controller{
   
    public function index(){
        $data['title'] = "Category | Airvels";
        $data['subtitle'] = "List of Post Category";
        $data['contentHeader'] = "mdl";
        $data['btn'] = array('title' => 'Add Category', 'url' => 'category/create', 'icon' => 'fas fa-plus');
        $data['category'] = post_category::all();
        return view('category.index',$data);
    }

    public function create(){
        $data['title'] = "Category | Airvels";
        $data['action'] = "add";
        return view('category.action',$data); 
    }

    public function store(Request $request){
        $data = new post_category;
        $data->name = $request->name;
        $data->title = $request->title;
        $data->color = $request->color;
        $data->create_date = date("Y-m-d H:i:s");
        $data->create_user = Session('id');
        $data->save();
        session::flash('error','success');
        session::flash('message','Add Category Successfull');
        return redirect('category');
    }

    public function show($id){
        
    }

    public function edit($id){
        $data['title'] = "Category | Airvels";
        $data['action'] = "edit";
        $data['data'] = post_category::findorfail($id);
        return view('category.action',$data); 
    }

    public function update(Request $request, $id){
        $data = post_category::findorfail($id);
        $data->name = $request->name;
        $data->title = $request->title;
        $data->color = $request->color;
        $data->create_date = date("Y-m-d H:i:s");
        $data->create_user = Session('id');
        $data->save();
        session::flash('error','success');
        session::flash('message','Edit Category Successfull');
        return redirect('category');
    }

    public function destroy($id){
        
    }
}
