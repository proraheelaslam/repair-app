@extends('admin.layout.login_app')

@section('content')


<!--begin::Login-->
<div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
    <!--begin::Aside-->
    <div class="login-aside d-flex flex-row-auto bgi-size-cover bgi-no-repeat p-10 p-lg-10" style="background-image: url({{asset('admin_assets/media/bg/bg-4.jpg')}});">
        <!--begin: Aside Container-->
        <div class="d-flex flex-row-fluid flex-column justify-content-between">
            <!--begin: Aside header-->

            <!--end: Aside header-->
            <!--begin: Aside content-->
            <div class="flex-column-fluid d-flex flex-column justify-content-center">
                <h3 class="font-size-h1 mb-5 text-white">Welcome to Repair App!</h3>
                <p class="font-weight-lighter text-white opacity-80"></p>
            </div>
            <!--end: Aside content-->
            <!--begin: Aside footer for desktop-->
            <div class="d-none flex-column-auto d-lg-flex justify-content-between mt-10">
                <div class="opacity-70 font-weight-bold text-white">© 2021 Repair app</div>

            </div>
            <!--end: Aside footer for desktop-->
        </div>
        <!--end: Aside Container-->
    </div>
    <!--begin::Aside-->
    <!--begin::Content-->
    <div class="d-flex flex-column flex-row-fluid position-relative p-7 overflow-hidden">
        <!--begin::Content header-->
        <div class="position-absolute top-0 right-0 text-right mt-5 mb-15 mb-lg-0 flex-column-auto justify-content-center py-5 px-10">

        </div>
        <!--end::Content header-->
        <!--begin::Content body-->
        <div class="d-flex flex-column-fluid flex-center mt-30 mt-lg-0">
            <!--begin::Signin-->
            <div class="login-form login-signin">
                <div class="text-center mb-10 mb-lg-20">
                    <h3 class="font-size-h1">Sign In</h3>
                    <p class="text-muted font-weight-bold">Enter your emailaddress and password</p>
                </div>
                <!--begin::Form-->
                {{-- id="kt_login_signin_form" --}}
                <form class="form"  role="form" method="POST" action="{{ url('/admin/login') }}">
                    {{ csrf_field() }}
                    @include('admin.auth_flash_messages')
                    <div class="form-group">
                        <input id="email" type="email" class="form-control form-control-solid h-auto py-5 px-6" name="email" placeholder="Email Address" value="{{ old('email') }}" autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">

                        <input id="password" type="password" class="form-control form-control-solid h-auto py-5 px-6" name="password" placeholder="Password"  autocomplete="off">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <!--begin::Action-->
                    <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                        {{-- <a href="javascript:;" class="text-dark-50 text-hover-primary my-3 mr-2" id="kt_login_forgot">Forgot Password ?</a> --}}
                        <button type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3">Sign In</button>
                    </div>
                    <!--end::Action-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Signin-->
            <!--begin::Forgot-->
            <div class="login-form login-forgot">
                <div class="text-center mb-10 mb-lg-20">
                    <h3 class="font-size-h1">Forgotten Password ?</h3>
                    <p class="text-muted font-weight-bold">Enter your email to reset your password</p>
                </div>
                <!--begin::Form-->
                <form class="form" novalidate="novalidate" id="kt_login_forgot_form">
                    <div class="form-group">
                        <input class="form-control form-control-solid h-auto py-5 px-6" type="email" placeholder="Email" name="email" autocomplete="off" />
                    </div>
                    <div class="form-group d-flex flex-wrap flex-center">
                        <button type="button" id="kt_login_forgot_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Submit</button>
                        <button type="button" id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-4">Cancel</button>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Forgot-->
        </div>
        <!--end::Content body-->
        <!--begin::Content footer for mobile-->
        <div class="d-flex d-lg-none flex-column-auto flex-column flex-sm-row justify-content-between align-items-center mt-5 p-5">
            <div class="text-dark-50 font-weight-bold order-2 order-sm-1 my-2">© 2021 Metronic</div>

        </div>
        <!--end::Content footer for mobile-->
    </div>
    <!--end::Content-->
</div>
<!--end::Login-->







@endsection
