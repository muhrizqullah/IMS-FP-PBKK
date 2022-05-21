<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="dist/img/logo/logo.png" rel="icon">
  <title>Register</title>
  <link href="dist/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="dist/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="dist/css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
  <!-- Register Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-7 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Register</h1>
                  </div>
                  <form method="POST" action="/register">
                    @csrf
                    <div class="form-group">
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Name" value="{{ old('name') }}" autofocus required>
                      @error('name')<div id="validationName" class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter Email Address" value="{{ old('email') }}" autofocus required>
                      @error('email')<div id="validationEmail" class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter Password" autofocus required>
                        @error('password')<div id="validationPassword" class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="/login">Already have an account?</a>
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Register Content -->
  <script src="dist/vendor/jquery/jquery.min.js"></script>
  <script src="dist/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="dist/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="dist/js/ruang-admin.min.js"></script>
</body>

</html>