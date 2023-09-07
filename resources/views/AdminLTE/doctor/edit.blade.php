<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('admin') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin') }}/dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new doctor</p>

    <form action="{{ route('doctor.update',$doctor->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="input-group mb-3">
        <input name="name" type="text" class="form-control" placeholder="Full name" value="{{ $doctor->name }}">
        <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-user">
                @error('name')
                {{ $message }}
            @enderror
            </span>
            </div>
        </div>
        </div>
        <div class="input-group mb-3">
          <input name="image" type="file" class="form-control" placeholder="image" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        
        <div class="input-group mb-3">
        <select name="major" >
        <option value="">select major</option>
            @foreach ( $majors as $major )
                <option value="{{ $major->id }}">{{ $major->title }}</option>
            @endforeach
        </select>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope">
                @error('major')
                {{ $message }}
                @enderror
                </span>
              </div>
            </div>
          </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('admin') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin') }}/dist/js/adminlte.min.js"></script>
</body>
</html>
