@extends('layout.main_black')
<link rel="stylesheet" href="{{ asset('css/register_employer.css') }}">
@section('title', 'Employer | Register ')

@section('content')

{{-- FormLogin --}}

    <div class="bg">    
        <div class="container">
            <div class="cardlogin">
                <form method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <h3 class="text-center" id="judul"><b>SIGN UP</b></h3>

                    <div class="form-group">
                        <input type="text" id="inputfirstname" name="firstname" class="first {{ $errors->has('firtname') ? 'is-invalid' : '' }}" placeholder="First Name" class="form-control" value="{{ old('firstname') }}">
                        @if ($errors->has('firstname'))
                            <div class="ivalid-feedback">
                                {{ $errors->first('firstname') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="text" id="inputlastname" name="lastname" class="last" placeholder="Last Name" class="form-control {{ $errors->has('lastname') ? 'is-invalid' : '' }}" value="{{ old('lastname') }}">
                        @if ($errors->has('lastname'))
                            <div class="invalid-feedback">
                                {{ $errors->first('lastname') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="Email" id="inputemail" name="email" placeholder="Email"  class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">
                        @if ($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="password" id="inputpassword" name="password" placeholder="Password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="myInput">
                        <img src="{{ asset('img/human-eye-shape.png') }}" class="tombol" alt="" onclick="myFunction()">
                        @if ($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="password" id="inputpassword1" name="password_confirmation" placeholder="Confirm Password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" id="myInput1">
                        <img src="{{ asset('img/human-eye-shape.png') }}" class="tombol" alt="" onclick="myFunction1()">
                        @if ($errors->has('password_confirmation'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password_confirmation') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" name="acc" class="form-check-input" id="exampleCheck1" required>
                        <label class="form-check-label" required for="exampleCheck1">I have read and agree with <b>Path</b>Finder's Terms and Conditions, Privacy Policy, and End User License Agreement</label>
                    </div>
                    <button type="submit" class="btn btn-secondary" id="btn_signin">SIGN UP</button>
                </form>
            </div>
        </div>
    </div>

{{-- EndFormLogin --}}

@endsection
