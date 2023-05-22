<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>少年</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/flickity.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('/img/shounen-v.ico') }}" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.pkgd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

    :root {
    --font-main: "Plus Jakarta Sans";
    --border-radius: 32px;
    font-size: 10px;
    }

    body {
      font-family: var(--font-main);
      overflow-x: hidden;
    }


    .banner1 {
      width: 70%;
      height: 100%;
      justify-content: center;
    }

.containerinti {
    height: auto;
    background: #fefefe;
    align-items: center;
    justify-content: space-between;
    border-radius: 10px 10px 10px 10px;
    margin: 20px auto;
    width: 90%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
    box-sizing: border-box;
    padding-bottom: 20px;
    }

.gallery {
    display: flex;
    flex-wrap: wrap;
    margin: -1rem -1rem;
    padding-bottom: 3rem;
}

.gallery1 {
  background: #EEE;
}

.gallery1-cell {
  width: 66%;
  height: 200px;
  margin-right: 10px;
  background: #8C8;
  counter-increment: gallery-cell;
}

.gallery-item {
    position: relative;
    flex: 1 0 22rem;
    margin: 1rem;
    color: #fff;
    cursor: pointer;
}

.gallery-item:hover .gallery-item-info,
.gallery-item:focus .gallery-item-info {
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.3);
}

.gallery-item-info {
    display: none;
}

.gallery-item-info li {
    display: inline-block;
    font-size: 1.7rem;
    font-weight: 600;
}

.gallery-item-likes {
    margin-right: 2.2rem;
}

.gallery-item-type {
    position: absolute;
    top: 1rem;
    right: 1rem;
    font-size: 2.5rem;
    text-shadow: 0.2rem 0.2rem 0.2rem rgba(0, 0, 0, 0.1);
}

.fa-clone,
.fa-comment {
    transform: rotateY(180deg);
}

.gallery-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}


.modal-dialog {
        background-color: transparent;
    }

    .picture-thumbnail {
        cursor: pointer;
        max-width: 100%;
        height: auto;
    }

    .picture-container {
        margin-right: 10px;
    }
    
    .close-button {
        position: absolute;
        top: 20px;
        right: 20px;
        font-size: 40px;
        color: #fff;
        opacity: 0.8;
    }
    
    .modal-content {
        position: relative;
    }

    .modal-lg {
  max-width: 60%;
}


.image-container {
    float: left;
    width: 50%;
  }

  .modal-dialog-centered {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 800px; /* Set the fixed height here */
}
.modal-body {
    background: azure;
    border-radius: 10px 10px 10px 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 600px; /* Set the fixed height here */
    overflow-y: auto;
}
#pictureModalImage {
    max-height: 100%;
    max-width: 80%;
}
.modal-body .col-md-8  {
  overflow: auto;
  max-height: 580px; /* Set the maximum height for the text container */
}


/* ///////////////////////////// */

.modal2 {
  display: none; 
  position: fixed; 
  z-index: 1; 
  padding-top: 100px; 
  left: 0;
  top: 0;
  width: 100%; 
  height: 100%; 
  overflow: auto; 
  background-color: rgb(0,0,0); 
  background-color: rgba(0,0,0,0.4); 
}

.modal2-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

.close2 {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.welcome-btn {
  background: none;
  border: none;
  padding: 0;
  font: inherit;
  cursor: pointer;
  outline: inherit;
}

.modal2.show {
  display: block;
}


.profilebox {
    position: relative;
    background: #ffffff;
    min-height: 230px;
    max-width: 700px;
    width: calc(60% - 120px);
    border-radius: 8px;
    padding: 50px 20px 20px 100px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.23), 0 10px 40px rgba(0, 0, 0, 0.19);
    display: flex;
    flex-direction: column;
}
.profpic {
    position: absolute;
    top: 20px;
    left: -60px;
    height: 120px;
    width: 120px;
    border-radius: 50%;
    border: 4px solid #e1e1e1;
    background: #22242a;
    display: inline-block;
    box-shadow: 0 1.5px 4px rgba(0, 0, 0, 0.24), 0 1.5px 6px rgba(0, 0, 0, 0.12);
}
.prof-close {
    position: absolute;
    top: 10px;
    right: 10px;
    height: 30px;
    line-height: 30px;
    width: 30px;
    background: transparent;
    outline: 0 none;
    border: none;
    border-radius: 50%;
    font-size: 18pt;
    color: rgba(255,255,255,.2);
    cursor: pointer;
    text-align: center;
    transition: all 0.15s ease-in-out;
}
.prof-close:active {
    background: rgba(255,255,255,.02);
    box-shadow: 0 1.5px 4px rgba(0, 0, 0, 0.24), 0 1.5px 6px rgba(0, 0, 0, 0.12);
}
.prof-sm {
    position: absolute;
    list-style: none;
    padding: 0;
    margin: 0;
    top: 152px;
    left: -20px;
    width: 40px;
}
.prof-sm .sm {
    width: 40px;
    height: 40px;
    margin-bottom: 4px;
    border-radius: 50%;
    background: #22242a;
    transition: all 0.15s ease-in-out;
    box-shadow: 0 1.5px 4px rgba(0, 0, 0, 0.24), 0 1.5px 6px rgba(0, 0, 0, 0.12);
}
.prof-sm .sm:hover {
    background: #26282E;
}
.prof-sm .sm:active {
    background: #31343b;
}
.prof-sm a {
    display: inline-block;
    height: 40px;
    width: 40px;
    border-radius: 50%;
}
.prof-sm svg {
    width: 30px;
    height: 30px;
    margin: 5px;
    border-radius: 50%;
}
.prof-sm path {
    fill: rgba(255,255,255,.2);
}
.prof-name {
    display: block;
    margin: 0;
    color: white;
    font-weight: normal;
    font-size: 20pt;
}
.prof-user {
    display: block;
    margin: 0;
    color: rgba(255,255,255,.2);
    font-weight: normal;
    font-size: 11pt;
}
.user-tags {
    margin: 20px 0 0 0;
    padding: 0;
    list-style: none;
    cursor: default;
}
.user-tags .tag {
    display: inline-block;
    font-size: 8pt;
    text-transform: lowercase;
    color: rgba(255,255,255,.5);
    background: rgba(255,255,255,.07);
    height: 20px;
    line-height: 20px;
    padding: 0 10px;
    border-radius: 10px;
    box-shadow: 0 1.5px 4px rgba(0, 0, 0, 0.24), 0 1.5px 6px rgba(0, 0, 0, 0.12);
}
.user-desc {
    color: rgb(0, 0, 0);
    font-size: 11pt;
    line-height: 12pt;
    flex: 1 0 auto;
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
              <img src="" alt="">
          </div>
          <ul>
              <li>
                  <a href="\home">Home</a>
              </li>
              
              <li>
                <a href="\docs"  >Docs</a>
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

  <div id="myModal" class="modal2">
    <div class="modal2-content profilebox">
      
          <aside>
            <img class="profpic" src="https://cdn-icons-png.flaticon.com/512/219/219983.png?w=1480&t=st=1684563110~exp=1684563710~hmac=cffc5488f063ec0766d72e20a06ee0f3927e5e985314085446b51c2aee838d78" alt="profile picture" />
            <span class="close2">&times;</span>

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
              <img src="" alt="">
          </div>
          <ul>
              <li>
                  <a href="/" >Home</a>
              </li>

              <li>
                <a href="/docs">Docs</a>
              </li>

              <li>
                <form action="/search" method="GET">
                  <input type="text" name="search" placeholder="Search...">
                  <button type="submit">Search</button>
                </form>
              </li>

              <li>
                <a href="/login" class="">Login</a>
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

    <br>

          <div class="containerinti"><br>
            <div class="h1 text-center" > 
              <h3 class="display-3">Edit Post</h1> 
              <br>
              <div class="d-flex justify-content-center">
                <div class="mr-3 p-2">
                <img src="{{ asset('storage/'. $post->image) }}" alt="{{ $post->title }}" class="gallery-image" style="max-height: 500px; max-width: 500px">
                </div> <br> <br> <br>
                <form method="POST" enctype="multipart/form-data" action="/user/post/{{ $post->slug }}/edit">
                    @csrf
                    <div class="p-2"> <br>
                      <label for="exampleInputEmail1" class="form-label">Title</label>
                      <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" aria-describedby="emailHelp" name="title" value="{{ $post->title }}"> 
                    @error('title')
                    <div class="text-danger">{{ $message }}</div>   
                    @enderror                   
                    </div>
                    <div class="p-2"> <br>
                      <input type="text" class="form-control form-control form-control-lg" id="slug" aria-describedby="emailHelp" name="slug" value="{{ $post->slug }}" hidden>                 
                    </div>
                    <div class="p-2">
                      <label for="exampleInputPassword1" class="form-label">deskripsi</label>
                      <input type="text" class="form-control form-control form-control-lg" id="exampleInputPassword1" name="deskripsi" value="{{ $post->deskripsi }}">
                      @error('deskripsi')
                      <div class="text-danger">{{ $message }}</div>   
                      @enderror 
                    </div> <br> <br>
                  
                    
                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>

                  </form>
                  
            </div>
            
              <br>
              <div>
              </div>            
            </div>
        </div>
    </div> <br>

        <div class="container">
            
            
          </div>

          @if(Session::has('hasil'))
          berhasil update

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
          <!-- Script -->
          <script>
              $('.picture-container').on('click', function() {
                  var image = $(this).data('image'); // Get the image path from data-image attribute
                  var modalId = $(this).data('target'); // Get the modal ID from data-target attribute
                  $(modalId).find('img').attr('src', image); // Set the image source in the modal
              });
          </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script>

      const title = document.querySelector('#exampleInputEmail1');
      const slug = document.querySelector('#slug')
      
      title.addEventListener('change', function() {
        fetch('/upload/slug?title=' + title.value).then(response => response.json()).then(data => slug.value = data.slug)
      });
      
          var modal = document.getElementById("myModal");
          var btn = document.getElementById("welcomeBack");
          var span = document.getElementsByClassName("close2")[0];
      
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