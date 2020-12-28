@extends('template')
@section('content')
<div class="hero-static">
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="block block-rounded block-themed mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Siapfulin</h3>
                        <div class="block-options">
                            <a class="btn-block-option" href="{{url('/')}}" data-toggle="tooltip" data-placement="left" title="Sign In">
                                <i class="fa fa-sign-in-alt"></i>
                            </a>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="p-sm-3 px-lg-3 py-lg-3">
                            <h2 class="h2 mb-1">Register</h2>
                            <form action="{{url('register')}}" method="POST" onsubmit="submit.disabled = true; return true;">@csrf
                                <div class="py-3">
                                    <div class="form-group email">
                                        <input type="email" class="form-control form-control-lg form-control-alt " id='email' name="email" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-lg form-control-alt" id='username' name="username" placeholder="Username" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-lg form-control-alt" name="company" placeholder="Company Name" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-lg form-control-alt pass1" name="pass1" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-lg form-control-alt pass2" name="pass2" placeholder="Konfirmasi Password">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-7 col-xl-6">
                                        <button type="submit" class="btn btn-block btn-alt-success submit">
                                            <i class="fa fa-fw fa-plus mr-1"></i> Daftar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footerScript')
<script>
$(function(){
    $("#email").keyup(function(){
        var email=$("#email").val();
        $.ajax({
            type: "POST",
            url: "{{url('register_check_duplicate_email')}}",
            data: {'_token': "{{ csrf_token() }}",'email': email},
            cache: false,
            success: function(data){
               if(data>=1){
                $("#email").addClass('is-invalid');
                $(".email").append('<div class="invalid-feedback">Email is already exist</div>');
                $('.submit').attr("disabled", true);
               }else{
                $("#email").removeClass('is-invalid');
                $(".invalid-feedback").remove();
                $('.submit').attr("disabled", false);
               }
            }
        });
    });
});

function check(notif){
    if($('.pass1').val()==$('.pass2').val()){
        $('.submit').attr("disabled", false);
        $('.pass1').addClass('is-valid').removeClass('is-invalid');
        $('.pass2').addClass('is-valid').removeClass('is-invalid');
    }else{
        $('.submit').attr("disabled", true);
        $('.pass1').removeClass('is-valid').addClass('is-invalid');
        $('.pass2').removeClass('is-valid').addClass('is-invalid');
    }
}

$('.pass1').blur(function(){
    if($('.pass2').val()!=''){
        check('1');
    }
});

$('.pass2').blur(function(){
    if($('.pass1').val()!=''){
        check('1');
    }
});

$('.pass2').keyup(function(){
    if($('.pass1').val()!=''){
        check('0');
    }
});
</script>
@endsection
