<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>upload</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{ asset('/css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/flickity.css') }}">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.pkgd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <style>
       .containerinti {
    height: 1200px;
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
    }
    </style>
  </head>
  <body>
    
    <header>
      <div class="logo">
          <p>Welcome Back {{ auth()->user()->first_name }}</p>
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
        <div class="containerinti">
            
            <div class="row align-items-center">
                <form method="POST" enctype="multipart/form-data" action="/upload">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Title</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title">
                    @error('title')
                    <div class="text-danger">{{ $message }}</div>   
                    @enderror                   
                    </div>
                    <div class="mb-3">
                      <label for="slug" class="form-label">Slug</label>
                      <input type="text" class="form-control" id="slug" aria-describedby="emailHelp" name="slug" >                 
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">deskripsi</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" name="deskripsi">
                      @error('deskripsi')
                      <div class="text-danger">{{ $message }}</div>   
                      @enderror 
                    </div>
                  
                    <div class="mb-3">
                        <label for="formFile" class="form-label">UP gambar</label>
                        <input class="form-control" type="file" id="formFile" name="image">
                        @error('image')
                      <div class="text-danger">{{ $message }}</div>   
                      @enderror 
                      </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
          </div>

          @if(Session::has('hasil'))

          berhasil

          @endif
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script>

      const title = document.querySelector('#exampleInputEmail1');
      const slug = document.querySelector('#slug')
      
      title.addEventListener('change', function() {
        fetch('/upload/slug?title=' + title.value).then(response => response.json()).then(data => slug.value = data.slug)
      });

    </script>
  </body>
</html>