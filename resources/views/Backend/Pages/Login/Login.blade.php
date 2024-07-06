<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Admin Login Dashboard</title>

    <!-- vendor css -->
    <link href="{{asset('Backend/lib/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('Backend/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{asset('Backend/css/bracket.css')}}">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center ht-100v">
      <img src="{{ asset('Backend/images/login_photo.jpg') }}" class="wd-100p ht-100p object-fit-cover" alt="">
      <div class="overlay-body bg-black-6 d-flex align-items-center justify-content-center">
        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 rounded bd bd-white-2 bg-black-7">
          <div class="signin-logo tx-center tx-28 tx-bold tx-white"><span class="tx-normal">[</span> Points <span class="tx-info">soft</span> <span class="tx-normal">]</span></div>
          <div class="tx-white-5 tx-center mg-b-60">Make Your Perfect Business</div>
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              @if(Session::has('error-message'))
                    <p class="alert alert-danger">{{ Session::get('error-message') }}</p>
              @endif
          <form action="{{ route('login.functionality') }}" method="post">
            @csrf
              <div class="form-group">
                  <input type="email" class="form-control fc-outline-dark" name="email" placeholder="Enter  Email" value="{{old('email')}}">
              </div><!-- form-group -->
              <div class="form-group">
                  <input type="password" class="form-control fc-outline-dark" name="password" placeholder="Enter Password">
                  <a href="#" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
              </div><!-- form-group -->
              <button type="submit" class="btn btn-info btn-block">Sign In</button>
          </form>
          <div class="mg-t-60 tx-center">Not yet a member? <a href="" class="tx-info">Sign Up</a></div>
        </div><!-- login-wrapper -->
      </div><!-- overlay-body -->
    </div><!-- d-flex -->

    

  </body>
</html>
