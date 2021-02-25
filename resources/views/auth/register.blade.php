@extends('layouts.master_blank')

@section('content')
    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
        <div class="login-brand">
            <img src="../assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
        </div>

        <div class="card card-primary">
            <div class="card-header"><h4>{{ __('Register') }}</h4></div>

            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="name">{{ __('Name') }}</label>
                            <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
{{--                        <div class="form-group col-6">--}}
{{--                            <label for="last_name">Last Name</label>--}}
{{--                            <input id="last_name" type="text" class="form-control" name="last_name">--}}
{{--                        </div>--}}
                    </div>
                    <div class="form-group">
                        <label for="email">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="password" class="d-block">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="password-confirm" class="d-block">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

{{--                    <div class="form-divider">--}}
{{--                        Your Home--}}
{{--                    </div>--}}
{{--                    <div class="row">--}}
{{--                        <div class="form-group col-6">--}}
{{--                            <label>Country</label>--}}
{{--                            <select class="form-control selectric">--}}
{{--                                <option>Indonesia</option>--}}
{{--                                <option>Palestine</option>--}}
{{--                                <option>Syria</option>--}}
{{--                                <option>Malaysia</option>--}}
{{--                                <option>Thailand</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <div class="form-group col-6">--}}
{{--                            <label>Province</label>--}}
{{--                            <select class="form-control selectric">--}}
{{--                                <option>West Java</option>--}}
{{--                                <option>East Java</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row">--}}
{{--                        <div class="form-group col-6">--}}
{{--                            <label>City</label>--}}
{{--                            <input type="text" class="form-control">--}}
{{--                        </div>--}}
{{--                        <div class="form-group col-6">--}}
{{--                            <label>Postal Code</label>--}}
{{--                            <input type="text" class="form-control">--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <div class="custom-control custom-checkbox">--}}
{{--                            <input type="checkbox" name="agree" class="custom-control-input" id="agree">--}}
{{--                            <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="mt-5 text-muted text-center">
            Eu Tenho Uma Conta! <a href="{{ route('login') }}">Faça Login</a>
        </div>
        <div class="simple-footer">
            Copyright &copy; {{date('Y')}}
        </div>
    </div>
@endsection
