<!DOCTYPE html>
<html lang="en" class="row h-100 mx-0">

<head>
    <title>REGISTER | KONTRAKAN</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
</head>

<body class="col-12 my-auto" style="background: url('assets/img/bg-03.jpg')">
    <div class="container" style="width: 450px">
        <div class="card text-white p-4" style="background: -webkit-linear-gradient(top, #29a609, #7ee80e);">
            <h3 class="text-center mb-4">Register</h4>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="text-center">
                        <img src="{{ asset('assets/img/bg-02.jpeg') }}" alt="AVATAR" class="img-fluid rounded-circle"
                            width="120" height="120">
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                            placeholder="Masukkan nama">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" placeholder="example@gmail.com">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password" placeholder="Masukkan password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Konfirmasi Password</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                            id="password" name="password_confirmation" placeholder="Masukkan konfirmasi password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mb-2">{{ __('Submit') }}</button>
                    @if (Route::has('login'))
                        <a class="text-white" href="{{ route('login') }}">
                            {{ __('Sudah Punya Akun? Langsung Saja Login') }}
                        </a>
                    @endif
                </form>
        </div>
    </div>
</body>

</html>
