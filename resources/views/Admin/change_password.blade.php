@extends('Admin.master')

@section('main')
    <div class="container">
        <div class="row justify-content-center margin-top ">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">تغییر رمز عبور</div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('admin/change/password/new') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">رمز عبور فعلی</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('passwordOld') ? ' is-invalid' : '' }}" name="passwordOld" required>

                                    @if ($errors->has('passwordOld'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('passwordOld') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">رمز عبور جدید</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">تکرار رمز عبور جدید</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        تغییر رمز عبور
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.9.0/alertify.min.js" ></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="/css/font.css">
    <link rel="stylesheet" href="/css/admin/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.9.0/css/alertify.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.9.0/css/themes/default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.9.0/css/themes/semantic.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.9.0/css/themes/semantic.rtl.min.css">



    @if(session('success'))
        <script type="text/javascript">
            $(document).ready(function () {
                alertify.success('{{session('success')}}');
            })
        </script>
    @endif
    @if(session('error'))
        <script type="text/javascript">
            $(document).ready(function () {
                alertify.error('{{session('error')}}');
            })
        </script>
    @endif


@endsection
