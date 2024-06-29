<html lang="en">
<head>
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
  <link id="main-css-href" rel="stylesheet" href="{{ asset('css/style.css')}}" />
</head>

</head>
  <body class="bg-light-gray" id="body">
          <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
          <div class="d-flex flex-column justify-content-between">
            <div class="row justify-content-center">
              <div class="col-lg-6 col-xl-8 col-md-10 ">
                <div class="card card-default mb-0">
                  <div class="card-header pb-0">
                    <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
                      <a class="w-auto pl-0" href="/index.html">
                        <!-- <span class="brand-name text-dark">TEST</span> -->
                      </a>
                    </div>
                  </div>
                  <div class="card-body px-5 pb-5 pt-0">
                    <h4 class="text-dark text-center mb-5">Sign In</h4>
                    <form action="{{ route('login') }}" method="POST">
                    @method('post')
                    @csrf
                      <div class="row">
                        <div class="form-group col-md-12 mb-4">
                          <input type="email" class="form-control input-lg" name="email" id="email" aria-describedby="emailHelp" placeholder="Email">
                          @error('email')
                              <span class="text-danger small wow flash">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="form-group col-md-12 ">
                          <input type="password" class="form-control input-lg" name="password" id="password" placeholder="Password">
                          <span id="toggle_pwd" class="fa fa-fw fa-eye field_icon"></span>

                          @error('password')
                              <span class="text-danger small wow flash">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="col-md-12 text-md-center">
                          <button type="submit" class="btn btn-primary btn-pill mb-4">Sign In</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        rel="stylesheet" type="text/css" />
        <script type="text/javascript">
          
        $(function () {
            $("#toggle_pwd").click(function () {
                $(this).toggleClass("fa-eye fa-eye-slash");
               var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
                $("#password").attr("type", type);
            });
        });
    </script>
</body>
</html>