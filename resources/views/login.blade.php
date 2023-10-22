<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login Your Account</title>
      <link rel="stylesheet" href="{{ asset('auth/style.css') }}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
    @if ($errors->any())
    <div class="error">


                @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">

                    <strong class="">{{ $error }}</strong>
                </div>
                @endforeach


    </div>
    @endif
    {{-- @if (session('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('failed') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif --}}
      <div class="login">
         <div class="text">
            LOGIN
         </div>
         <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="field">
               <div class="fas fa-envelope"></div>
               <input type="email" name="email" placeholder="Enter your email " class="@error('email') is-invalid @enderror">
            </div>
            <div class="field">
               <div class="fas fa-lock"></div>
               <input type="password" name="password" placeholder="Enter your password" class="@error('email') is-invalid @enderror">
            </div>
            <button type="submit">LOGIN</button>
            <div class="link">
               Not a member?
               <a href="/register">Signup now</a>
            </div>
         </form>
      </div>
   </body>
</html>
