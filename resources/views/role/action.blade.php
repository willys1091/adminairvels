@extends('template')
@section('content')
<div class="content">
    <div class="block block-rounded">
        <div class="block-content block-content-full">
            @if($action=='add')
                <form action="{{url('role')}}" method="post" onsubmit="submit.disabled = true; return true;" name="roleform">
            @else
                <form action="{{url('role/'.$role->id)}}" method="post" name="roleform"> @method('patch')
                <input type="hidden" name="id" value="{{$role->id}}"/>
            @endif @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="Name">Name <span class="merah">*</span></label>
                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{$action=='edit'? $role->name : ''}}" required>
                        </div>
                    </div>
               
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="Name">Type <span class="merah">*</span></label>
                            <select class="js-select2 form-control" name="type" style="width: 100%;" data-placeholder="Choose one..">
                                <option></option>
                                <option value="user" {{$action == 'edit'? $role->type == 'user'? 'selected' : '' : ''}}>User</option>
                                <option value="admin" {{$action == 'edit'? $role->type == 'admin'? 'selected' : '' : ''}}>Admin</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @php $perms = $action=='edit'? unserialize($role->perms):""  @endphp
                    <div class="form-group col-md-3">
                        <div class=""><h5>Country</h5>
                            <div class="custom-control custom-checkbox custom-control-lg mb-1">
                                <input type="checkbox" class="custom-control-input" id="AddCountry" name="perms[]" {{$action =='edit'? in_array("AddCountry",$perms)?"checked":"":''}} value = "AddCountry">
                                <label class="custom-control-label" for="AddCountry">Add</label>  
                            </div>
                            <div class="custom-control custom-checkbox custom-control-lg mb-1">
                                <input type="checkbox" class="custom-control-input" id="EditCountry" name="perms[]" {{$action == 'edit'? in_array("EditCountry",$perms)?"checked":"":''}} value = "EditCountry">
                                <label class="custom-control-label" for="EditCountry">Edit</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-lg mb-1">
                                <input type="checkbox" class="custom-control-input" id="ViewCountry" name="perms[]" {{$action=='edit'? in_array("ViewCountry",$perms)?"checked":"":''}} value = "ViewCountry">
                                <label class="custom-control-label" for="ViewCountry">View</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <div class=""><h5>Category</h5>
                            <div class="custom-control custom-checkbox custom-control-lg mb-1">
                                <input type="checkbox" class="custom-control-input" id="AddCategory" name="perms[]" {{$action =='edit'? in_array("AddCategory",$perms)?"checked":"":''}} value = "AddCategory">
                                <label class="custom-control-label" for="AddCategory">Add</label>  
                            </div>
                            <div class="custom-control custom-checkbox custom-control-lg mb-1">
                                <input type="checkbox" class="custom-control-input" id="EditCategory" name="perms[]" {{$action == 'edit'? in_array("EditCategory",$perms)?"checked":"":''}} value = "EditCategory">
                                <label class="custom-control-label" for="EditCategory">Edit</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-lg mb-1">
                                <input type="checkbox" class="custom-control-input" id="ViewCategory" name="perms[]" {{$action=='edit'? in_array("ViewCategory",$perms)?"checked":"":''}} value = "ViewCategory">
                                <label class="custom-control-label" for="ViewCategory">View</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <div class=""><h5>Destination</h5>
                            <div class="custom-control custom-checkbox custom-control-lg mb-1">
                                <input type="checkbox" class="custom-control-input" id="AddDestination" name="perms[]" {{$action =='edit'? in_array("AddDestination",$perms)?"checked":"":''}} value = "AddDestination">
                                <label class="custom-control-label" for="AddDestination">Add</label>  
                            </div>
                            <div class="custom-control custom-checkbox custom-control-lg mb-1">
                                <input type="checkbox" class="custom-control-input" id="EditDestination" name="perms[]" {{$action == 'edit'? in_array("EditDestination",$perms)?"checked":"":''}} value = "EditDestination">
                                <label class="custom-control-label" for="EditDestination">Edit</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-lg mb-1">
                                <input type="checkbox" class="custom-control-input" id="ViewDestination" name="perms[]" {{$action=='edit'? in_array("ViewDestination",$perms)?"checked":"":''}} value = "ViewDestination">
                                <label class="custom-control-label" for="ViewDestination">View</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <div class=""><h5>Admin</h5>
                            <div class="custom-control custom-checkbox custom-control-lg mb-1">
                                <input type="checkbox" class="custom-control-input" id="AddAdmin" name="perms[]" {{$action =='edit'? in_array("AddAdmin",$perms)?"checked":"":''}} value = "AddAdmin">
                                <label class="custom-control-label" for="AddAdmin">Add</label>  
                            </div>
                            <div class="custom-control custom-checkbox custom-control-lg mb-1">
                                <input type="checkbox" class="custom-control-input" id="EditAdmin" name="perms[]" {{$action == 'edit'? in_array("EditAdmin",$perms)?"checked":"":''}} value = "EditAdmin">
                                <label class="custom-control-label" for="EditAdmin">Edit</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-lg mb-1">
                                <input type="checkbox" class="custom-control-input" id="ViewAdmin" name="perms[]" {{$action=='edit'? in_array("ViewAdmin",$perms)?"checked":"":''}} value = "ViewAdmin">
                                <label class="custom-control-label" for="ViewAdmin">View</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <div class=""><h5>User</h5>
                            <div class="custom-control custom-checkbox custom-control-lg mb-1">
                                <input type="checkbox" class="custom-control-input" id="AddUser" name="perms[]" {{$action=='edit'? in_array("AddUser",$perms)?"checked":"":''}} value = "AddUser">
                                <label class="custom-control-label" for="AddUser">Add</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-lg mb-1">
                                <input type="checkbox" class="custom-control-input" id="EditUser" name="perms[]" {{$action=='edit'? in_array("EditUser",$perms)?"checked":"":''}} value = "EditUser">
                                <label class="custom-control-label" for="EditUser">Edit</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-lg mb-1">
                                <input type="checkbox" class="custom-control-input" id="ViewUser" name="perms[]" {{$action=='edit'? in_array("ViewUser",$perms)?"checked":"":''}} value = "ViewUser">
                                <label class="custom-control-label" for="ViewUser">View</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <div class=""><h5>Role</h5>
                            <div class="custom-control custom-checkbox custom-control-lg mb-1">
                                <input type="checkbox" class="custom-control-input" id="AddRole" name="perms[]" {{$action=='edit'? in_array("AddRole",$perms)?"checked":"":''}} value = "AddRole">
                                <label class="custom-control-label" for="AddRole">Add</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-lg mb-1">
                                <input type="checkbox" class="custom-control-input" id="EditRole" name="perms[]" {{$action=='edit'? in_array("EditRole",$perms)?"checked":"":''}} value = "EditRole">
                                <label class="custom-control-label" for="EditRole">Edit</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-lg mb-1">
                                <input type="checkbox" class="custom-control-input" id="ViewRole" name="perms[]" {{$action=='edit'? in_array("ViewRole",$perms)?"checked":"":''}} value = "ViewRole">
                                <label class="custom-control-label" for="ViewRole">View</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <div class=""><h5>Logs</h5>
                            <div class="custom-control custom-checkbox custom-control-lg mb-1">
                                <input type="checkbox" class="custom-control-input" id="LogSystem" name="perms[]" {{$action=='edit'? in_array("LogSystem",$perms)?"checked":"":''}} value = "LogSystem">
                                <label class="custom-control-label" for="LogSystem">System</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-lg mb-1">
                                <input type="checkbox" class="custom-control-input" id="LogEmail" name="perms[]" {{$action=='edit'? in_array("LogEmail",$perms)?"checked":"":''}} value = "LogEmail">
                                <label class="custom-control-label" for="LogEmail">Email</label>
                            </div>
                           
                        </div>
                    </div>

                   
                    <div class="col-md-12">&nbsp;</div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {{$action=='add' ? 'Create' : 'Save'}}</button>
                        <a onclick="javascript:checkAll(true);" href="javascript:void();" class="btn btn-light" ><i class="fal fa-check-square"></i> Check All</a>
                        <a onclick="javascript:checkAll(false);" href="javascript:void();" class="btn btn-light" ><i class="fal fa-square"></i> Uncheck All</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section ('headerScript')
    @livewireStyles
 
    <link rel="stylesheet" id="css-main" href="{{asset('public/js/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" id="css-main" href="{{asset('public/js/plugins/flatpickr/flatpickr.min.css')}}">
@endsection

@section ('footerScript')
    @livewireScripts
    <script src="{{asset('public/js/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('public/js/siapfulin.js')}}"></script>

    <script>
        jQuery(function () {
            Siap.helpers([ 'select2','masked-inputs']);
        });

        function checkAll(checktoggle){
            var checkboxes = new Array();
            checkboxes = document['roleform'].getElementsByTagName('input');

            for (var i=0; i<checkboxes.length; i++)  {
                if (checkboxes[i].type == 'checkbox')   {
                    checkboxes[i].checked = checktoggle;
                }
            }
        }
    </script>
@endsection
