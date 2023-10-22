<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Register Your Account</title>
      <link rel="stylesheet" href="{{ asset('auth/style.css') }}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
   <div class="register">
    @if ($errors->any())
    <div style="margin-right:15px">
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show error" role="alert">

                    <strong class="">{{ $error }}</strong>
                </div>
                @endforeach
    </div>
    @endif
      <div class="login-form">
         <div class="text">
            Register
         </div>
         <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="field">
                <div class="fas fa-user"></div>
                <input type="text" name="username" placeholder="Enter your name">
             </div>
            <div class="field">
               <div class="fas fa-envelope"></div>
               <input type="email" name="email" placeholder="Enter your email ">
            </div>
            <div class="field">
                <div class="fas fa-image"></div>
                <label for="image" class="image"><p>Choose your image...</p></label>
                <input type="file" name="image" id="image" style="display: none">
             </div>
            <div class="field">
                <div class="fas fa-phone"></div>
                <input type="text" name="phone" placeholder="Enter your phone no.">
            </div>
            <div class="field">
                <div class="fas fa-map"></div>
                <textarea type="text" name="address" placeholder="Enter your address"></textarea>
             </div>
             <div class="field">
                <div class="fas fa-lock"></div>
                <input type="password" name="password" placeholder="Enter your password">
             </div>
             <div class="field">
                 <div class="fas fa-lock"></div>
                 <input type="password" name="password_confirmation" placeholder="Confirm your password">
             </div>
            <button type="submit">Register</button>
            <div class="link">
               Already a member ?
               <a href="/login">Login your account now ! </a>
            </div>
         </form>
      </div>
   </div>
   </body>
</html>
