<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <title>login</title>
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #ffffff;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4caf50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #ffffff;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,
.form button:active,
.form button:focus {
  background: #43a047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4caf50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before,
.container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #ef3b3a;
}
body {
  background: #76b852; /* fallback for old browsers */
  background: rgb(141, 194, 111);
  background: linear-gradient(
    90deg,
    rgba(141, 194, 111, 1) 0%,
    rgba(118, 184, 82, 1) 50%
  );
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

</style>
</head>
<body>
    <div class="login-page">
        <div class="form">
          <form class="register-form" method="POST" action="/register">
            @csrf
            <input type="text" placeholder="Nama Depan" name="first_name" value="{{ old('first_name') }}" />
            @error('first_name')
                      <div class="text-danger">{{ $message }}</div>   
                      @enderror 
            <input type="text" placeholder="Nama Belakang" name="last_name" value="{{ old('last_name') }}"/>
            @error('last_name')
                      <div class="text-danger">{{ $message }}</div>   
                      @enderror 
            <input type="date" placeholder="Tanggal Lahir" name="tanggal_lahir" id="date" value="{{ old('tanggal_lahir') }}"/>
            @error('tanggal_lahir')
                      <div class="text-danger">{{ $message }}</div>   
                      @enderror 
            <input type="text" placeholder="Email Address" name="email" value="{{ old('email') }}"/>
            @error('email')
                      <div class="text-danger">{{ $message }}</div>   
                      @enderror 
            <input type="password" placeholder="Password" name="password" />
            @error('password')
                      <div class="text-danger">{{ $message }}</div>   
                      @enderror 
            <input type="password" placeholder="Confirm Password" name="password_confirmation"/>
            @error('password_confirmation')
                      <div class="text-danger">{{ $message }}</div>   
                      @enderror 

            <button type="submit">create</button>
            <p class="message">Already registered? <a href="#">Sign In</a></p>
            
          </form>
          <form class="login-form" method="POST" action="/login">
            @csrf
            <input type="text" placeholder="Email" name="email"/>
            @error('email')
                      <div class="text-danger">{{ $message }}</div>   
                      @enderror 
            <input type="password" placeholder="Password" name="password"/>
            @error('password')
                      <div class="text-danger">{{ $message }}</div>   
                      @enderror 
            <button type="submit">login</button>
            <p class="message">Not registered? <a href="#">Create an account</a></p>
          </form>
        </div>
      </div>
      @if(Session::has('hasil'))

            berhasil
  
            @endif


      <script>
        $('.message a').click(function(){
        $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
        });
      </script>

</body>
</html>