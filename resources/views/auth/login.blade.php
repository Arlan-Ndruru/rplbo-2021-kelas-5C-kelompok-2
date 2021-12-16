@extends('layouts.home.main')

@section('content-main')
    <main class="main-content mt-0">
        <div class="page-header align-items-start min-vh-100"
            style="background-image: url('home/assets/img/city-profile.jpg');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (session()->has('need'))
                                <div class="alert alert-success" role="alert">
                                    <i class="text-white">{{session('need')}}</i>
                                </div>
                                @endif
                                @if (session()->has('confirm'))
                                <div class="alert alert-info" role="alert">
                                    <i class="text-white">{{session('confirm')}} <br> or you can wait within 24 hours</i>
                                    <i class="bi bi-emoji-smile text-white"></i>
                                </div>
                                @endif
                                <form role="form" method="POST" action="{{route('login')}}" class="text-start">
                                    @csrf
                                    <div class="input-group input-group-dynamic my-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" value="{{old('email')}}" required autofocus class="form-control">
                                    </div>
                                    <div class="input-group input-group-dynamic mb-3" id="show_hide_password">
                                        <label class="form-label">Password</label>
                                        <input type="password" id="showpassword" name="password" required required autocomplete="current-password" class="form-control">
                                        <div class="input-group-addon">
                                            <a href=""><i class="btn btn-primary border-0 fa fa-eye-slash" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                        
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-primary w-75  my-4 mb-2">Sign
                                            in</button>
                                    </div>
                                    <p class="mt-4 text-sm text-center">
                                        Don't have an account?
                                        <a href="/register"
                                            class="text-primary text-gradient font-weight-bold">Sign up</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
    <script>
        $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
        $('#show_hide_password input').attr('type', 'password');
        $('#show_hide_password i').addClass( "fa-eye-slash" );
        $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
        $('#show_hide_password input').attr('type', 'text');
        $('#show_hide_password i').removeClass( "fa-eye-slash" );
        $('#show_hide_password i').addClass( "fa-eye" );
        }
        });
        });
    </script>
@endsection
