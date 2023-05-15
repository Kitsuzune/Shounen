
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



    </style>
</head>
<body>
    @auth
    <header>
      <div class="logo">
          <p>Welcome Back {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</p>
      </div>
      <input type="checkbox" id="nav_check" hidden>
      <nav>
          <div class="logo">
              <img src="logo.png" alt="">
          </div>
          <ul>
              <li>
                  <a href="#" class="active">Home</a>
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

    {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="user\post">My post</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="\upload">Upload</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Welcome Back {{ auth()->user()->first_name }}
                </a>
                <form action="/logout" method="post">
                    @csrf
                <button type="submit">logout</button>
                </form>

                <form action="/search" method="GET">
                  <input type="text" name="search" placeholder="Search...">
                  <button type="submit">Search</button>
              </form>
              </li>
            </ul>
          </div>
        </div>
      </nav> --}}
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
                  <a href="#" class="active">Home</a>
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
    {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="/login" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  login
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav> --}}
    @endauth
    

        <div class="containerinti">
          <br><div class="h1 text-center" > 
            <h1 class="display-3">Latest Event</h1> 
            <br>
            <div class="gallery1 js-flickity" data-flickity-options='{ "wrapAround": true }'>
            <div class="gallery1-cell"><img class="banner1" src="{{ asset('img/banner1.png') }}" alt=""></div>
            </div>
            
          </div> <br>

          <div class="containerinti"><br>
            <div class="h1 text-center" > 
              <h1 class="display-3">Shounen Data</h1> 
              <br>
              <div class="d-flex justify-content-center">
                {!! $TotalUser->container() !!}
                {!! $TotalUser2->container() !!}
              </div>
              
            </div> <br>


          <br><div class="h1 text-center" > <h1 class="display-3">Explore Your Idea</h1> </div> <br>
            <div class="row">
                @foreach($posts as $post)
                <div class="col-md-4 mb-3">
                    <div class="gallery-item picture-container" tabindex="0" data-toggle="modal" data-target="#pictureModal{{ $post->id }}" data-image="{{ asset('storage/'. $post->image) }}">
                        <img src="{{ asset('storage/'. $post->image) }}" alt="{{ $post->title }}" class="gallery-image" style="max-height: 250px;">
                    </div>
                </div>
                @endforeach
            </div>
            {{ $posts->links() }}

            
            <!-- Modal -->
            @foreach($posts as $post)
            <div class="modal fade" id="pictureModal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="pictureModalLabel{{ $post->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <button type="button" class="close close-button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-body row">
                            <div class="col-md-8">
                                <img src="{{ asset('storage/'. $post->image) }}" alt="{{ $post->title }}" class="img-fluid" style="max-height: 100%; max-width: 100%;">
                            </div>
                            <div class="col-md-4"> 
                                <h3>{{ $post->title }}</h3>
                                <h5>{{ $post->deskripsi }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            @endforeach
        
        </div>
        </div>
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
        
      
        

        <!-- End of container -->

        <script src="{{ $TotalUser->cdn() }}"></script>
        <script src="{{ $TotalUser2->cdn() }}"></script>

        {{ $TotalUser->script() }}
        {{ $TotalUser2->script() }}
        


</body>
</html>