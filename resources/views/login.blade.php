<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('/img/shounen-v.ico') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/flickity.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('/img/shounen-v.ico') }}" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.pkgd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <title>Welcome To Shounen</title>
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
  border-radius: 20px 20px 20px 20px;
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
  border-radius: 10px 10px 10px 10px;
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
  border-radius: 10px 10px 10px 10px;
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
  background: #e3e9f7;
  background: linear-gradient(to right, #e3e9f7, #e3e9f7);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

</style>
</head>
<body>
  @auth
  <header>
    <div class="logo">
      <button id="welcomeBack" class="welcome-btn">Welcome Back {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</button>


    </div>
    <input type="checkbox" id="nav_check" hidden>
    <nav>
        <div class="logo">
            <img src="logo.png" alt="">
        </div>
        <ul>
            <li>
                <a href="/">Home</a>
            </li>
            
            <li>
              <a href="\docs"  class="active">Docs</a>
            </li>

            <li>
                <a href="user\post">My Post</a>
            </li>

            <li>
                <a href="\upload">Upload</a>
            </li>

            <li>
              <form action="/search" method="GET">
                <input type="text" name="search" placeholder="Search...">
                <button type="submit">Search</button>
              </form>
            </li>

            <li>
                <form action="/logout" method="post">
                  @csrf
                  <button type="submit">logout</button>
                </form>
                
            </li>

        </ul>
    </nav>
    <label for="nav_check" class="hamburger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </label>
</header>
@php( $user = auth()->user())

<div id="myModal" class="modal">
  <div class="modal-content profilebox">
    
        <aside>
          <img class="profpic" src="https://cdn-icons-png.flaticon.com/512/219/219983.png?w=1480&t=st=1684563110~exp=1684563710~hmac=cffc5488f063ec0766d72e20a06ee0f3927e5e985314085446b51c2aee838d78" alt="profile picture" />
          <span class="close">&times;</span>

        </aside>
        <main class="user-desc">
          <div class="text-center">
            <h1 class="display-3">Profil user</h1>
            <table class="table ">
                <tbody>
                    <tr>
                        <th class="text-start">Nama:</th>
                        <td class="text-start">{{ $user->first_name }} {{ $user->last_name }}</td>
                    </tr>
                    <tr>
                        <th class="text-start">Tanggal lahir:</th>
                        <td class="text-start">{{ $user->tanggal_lahir }}</td>
                    </tr>
                    <tr>
                        <th class="text-start">Email:</th>
                        <td class="text-start">{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th class="text-start">Membuat akun pada:</th>
                        <td class="text-start">{{ date('Y-m-d', strtotime($user->created_at)) }}</td>
                    </tr>
                    <tr>
                        <th class="text-start">Upload sebanyak:</th>
                        <td class="text-start">{{ $user->post()->count() }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-4">
                <a href="/export" class="btn btn-primary btn-lg">Export Data</a>
            </div>
        </div>
        </main>

  </div>
</div>


  @else
  <header>
    <div class="logo">
        <p>Shounen</p>
    </div>
    <input type="checkbox" id="nav_check" hidden>
    <nav>
        <div class="logo">
            <img src="logo.png" alt="">
        </div>
        <ul>
            <li>
                <a href="/home" >Home</a>
            </li>

            <li>
              <a href="/docs" >Docs</a>
            </li>

            <li>
              <form action="/search" method="GET">
                <input type="text" name="search" placeholder="Search...">
                <button type="submit">Search</button>
              </form>
            </li>

            <li>
              <a href="/login" class="active">Login</a>
            </li>

        </ul>
    </nav>
    <label for="nav_check" class="hamburger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </label>
</header>
  @endauth
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



            <footer>
              {{-- <div class="footer-left">
                  <h3>Shounen</h3>
                  <ul>
                    <li><a href="#">Docs</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">eBooks</a></li>
                    <li><a href="#">Webinars</a></li>
                  </ul>
              </div>
              <div class="footer-right">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo iste corrupti doloribus odio sed!</p>
            </div>
              <div class="footer-bottom">
                  <p>copyright &copy;2020 codeOpacity. designed by <span>nethunt</span></p>
              </div> --}}
              <section class="ft-main">
                <div class="ft-main-item">
                  <h2 class="ft-title">Shounen　ー　少年</h2>
                  <ul>
                    <li>Lorem ipsum dolor sit amet </li>
                    <li>どどどどどどどどどど。。。。。</li>
                  </ul>
                </div>
                <div class="ft-main-item">
                  <h2 class="ft-title">What Are You Looking?</h2>
                  <ul>
                    <li><a href="#">Discover</a></li>
                    <li><a href="#">Account</a></li>
                    <li><a href="#">My Post</a></li>
                    <li><a href="#">Data</a></li>
                  </ul>
                </div>
                <div class="ft-main-item">
                  <h2 class="ft-title">About Creator</h2>
                  <ul>
                    <li><a href="https://github.com/Kitsuzune">Bowo</a></li>
                    <li><a href="https://github.com/Kevinnn1701">Kevin</a></li>
                    <li><a href="https://github.com/Kitsuzune/Shounen">Source Code</a></li>
                  </ul>
                </div>
                <div class="ft-main-item">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.5511363812143!2d106.8764383107403!3d-6.190764193770975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f557e247a3d7%3A0x1c57cc86bd8ca3b2!2sKONOHA!5e0!3m2!1sen!2sid!4v1684143965179!5m2!1sen!2sid" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  
                </div>
              </section>
            
              <!-- Footer legal -->
              <section class="ft-legal">
                <ul class="ft-legal-list">
                  <li>All Right Reserved Created With</li>
                  <li><a href="https://laravel.com/">Laravel 7.3</a></li>
                  <li>&copy; 2023 Copyright Mercubuana University.</li>
                </ul>
              </section>
          </footer>

      <script>
        $('.message a').click(function(){
        $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
        });
      </script>

    <script>
      var modal = document.getElementById("myModal");
      var btn = document.getElementById("welcomeBack");
      var span = document.getElementsByClassName("close")[0];
  
      btn.onclick = function() {
       modal.classList.add("show");
      }
  
     span.onclick = function() {
      modal.classList.remove("show");
      }
  
     window.onclick = function(event) {
      if (event.target == modal) {
     modal.classList.remove("show");
        }
     }
    </script>

    
</body>
</html>