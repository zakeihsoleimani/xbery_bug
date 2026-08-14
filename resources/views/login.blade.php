<!DOCTYPE html>
<html dir="rtl" lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{url('assets/library/bootstrap/bootstrap.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('assets/library/shadonic/login.css') }}">
    <link rel="icon" type="image/x-icon" href="{{url('assets/icons/bug.png') }}">
    <title>سامانه باگ</title>
</head>
<body>
    <section class="login hieght-100vh">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container-fluid h-100">
            <div class="row d-flex justify-content-center align-items-end h-100">
                <div class="col-lg-5 d-flex justify-content-center align-items-center">
                    <div class="border border-2 shadow rounded-3 login-box p-2 p-lg-5">
                        <div class="d-flex justify-content-start" >
                            <img height="40" src="{{url('assets/icons/bug.png') }}" />
                            <h6 class="py-3 px-3 text-sorme fw-bold">سامانه‌ باگ</h6>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end align-items-end pb-3">
                    <div class="col-12 d-flex justify-content-end copy-right">
                        <p class="m-0 bg-white rounded-4 shadow p-1 px-2">Copyright © Shadonic Group</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
