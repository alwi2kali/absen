<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
</head>
<style>
    body {
        font-family: "Lato", sans-serif;
    }



    .main-head{
        height: 150px;
        background: #FFF;

    }

    .sidenav {
        height: 100%;
        background-color: #6c8cbf;
        overflow-x: hidden;
        padding-top: 20px;
    }


    .main {
        padding: 0px 10px;
    }

    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
    }

    @media screen and (max-width: 450px) {
        .login-form{
            margin-top: 10%;
        }

        .register-form{
            margin-top: 10%;
        }
    }

    @media screen and (min-width: 768px){
        .main{
            margin-left: 40%;
        }

        .sidenav{
            width: 40%;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
        }

        .login-form{
            margin-top: 25%;
        }

        .register-form{
            margin-top: 20%;
        }
    }


    .login-main-text{
        margin-top: 20%;
        padding: 60px;
        color: #fff;
    }

    .login-main-text h2{
        font-weight: 300;
    }

    .btn-black{
        background-color: #000 !important;
        color: #fff;
    }
</style>
<body>
<div class="sidenav">
    <div class="login-main-text">
        <br><br><br><br><br><br>
        <img style="width: 20%" src="{{asset('image/logo.png')}}" alt="">
        <h2>ABSENSI PEGAWAI PILAR MEDIA<br> </h2>
        <h3>Register</h3>
        <p>Isi Data sesuai kolom isian</p>
    </div>
</div>
<div class="main">
    <div class="col-md-6 col-sm-12">
        <div class="login-form">
            @if(\Illuminate\Support\Facades\Session::has('failed'))
                <div class="alert bg-danger">
                    <b style="color: white">Silahkan Login Terlebih Dahulu</b>
                </div>

            @endif
            @if(\Illuminate\Support\Facades\Session::has('gagal'))
                <div class="alert bg-danger">
                    <b style="color: white">Gagal Melakukan Pendaftaran</b>
                </div>
            @endif
            <form method="post" action="{{route('store_register')}}">
                @csrf
                <div class="form-group">
                    <label>username(id_pegawai)</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Lokasi</label>
                    <select name="lokasi_kantor" id="lokasi_kantor" class="form-control">
                        @foreach($lokasi as $key)
                        <option value="{{$key->nama_kantor}}">{{$key->nama_kantor}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Shift</label>
                    <select name="s" id="s" class="form-control">
                        @foreach($shift as $key)
                        <option value="{{$key->nama_shift}}">{{$key->nama_shift}}</option>
                        @endforeach
                    </select>
                </div>
                
                <button type="submit" class="btn" style="background: #6c8cbf;color: white">register</button>
                <p>Sudah Punya Akun? <b><a href="{{route('login')}}">Login Sekarang</a></b></p>
            </form>
        </div>
    </div>
</div>
</body>

</html>
<!-- end document-->
