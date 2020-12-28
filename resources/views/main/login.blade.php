@extends('template')
@section('content')
<div class="hero-static">
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4 mt-lg-5">
                <div class="block block-rounded block-themed mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Airvels</h3>
                    </div>
                    <div class="block-content">
                        <div class="p-sm-3 px-lg-4 py-lg-3">
                            <form class="js-validation-signin" action="{{url('auth')}}" method="POST">@csrf
                                <div class="py-3">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-alt form-control-lg" name="email" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-alt form-control-lg" name="password" placeholder="Password" required>
                                    </div>
                                    <a href="{{url('forgot')}}"> Forgot Password?</a>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6 col-xl-5">
                                        <button type="submit" class="btn btn-block btn-alt-primary">
                                            <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Sign In
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
