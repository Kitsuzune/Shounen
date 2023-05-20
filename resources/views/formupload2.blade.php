<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Your UwU </title>
    <link rel="stylesheet" href="{{ asset('/css/form.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('/img/shounen-v.ico') }}" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{ asset('/css/navfo.css') }}">
    <script src="{{ asset('/js/form.js') }}"></script>

</head>
<body>
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
                <a href="\" >Home</a>
            </li>
            
            <li>
                <a href="user\post">My Post</a>
            </li>

            <li>
                <a href="#" class="active">Upload</a>
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
    <div class="container">
      <div class="done">
        Upload Succes :3
        <button> <- Let's Head Back </button>
      </div>
      <div class="red">
        <div class="circle">
          <div class="squareC2"></div>
        </div>
      </div>
      <div class="pokemon">
        <div class="top">
          <div class="middle"></div>
        </div>
        <div class="square square1"></div>
        <div class="square square2"></div>
        <div class="square square3"></div>
        <div class="eye eye-left">
          <div class="fix2 f"></div>
          <div class="pupil"></div>
        </div>
        <div class="sleep-eye sleep-eye-left"></div>
        <div class="sleep-eye sleep-eye-right"></div>
        <div class="eye eye-right">
          <div class="fix f"></div>
          <div class="pupil2"></div>
        </div>
        <div class="nose"></div>
        <div class="mouth">
          <div class="teeth"></div>
          <div class="tongue"></div>
        </div>
      </div>

      <form method="POST" enctype="multipart/form-data" action="/upload">
        @csrf
        <p>Title</p>
        <input type="text" class="email input" name="title" placeholder="あなたの肩書は何ですか...?" id="email">
        @error('title')
        <div class="text-danger">{{ $message }}</div>   
        @enderror    

        <input type="text" class="email input" name="slug" placeholder="あなたのタグは何ですか...?" id="slug" hidden>
        
        <p>Deskripsi</p>
        <input type="text" class="email input" name="deskripsi" placeholder="あなたの説明は何ですか...?">
        @error('deskripsi')
        <div class="text-danger">{{ $message }}</div>   
        @enderror 

        <p>Image</p>
        <input type="file" id="formFile" name="image">
        @error('image')
        <div class="text-danger">{{ $message }}</div>   
        @enderror 

        <div class="button"> <button class="submit-button" type="submit">
            Submit
            </button>
          </div>
      </form>
      
    </div>
    <div class="leafs">
      <div class="leaf leaf1"></div>
      <div class="leaf leaf2"></div>
      <div class="leaf leaf3"></div>
      
      <div class="leaf leaf4"></div>
      <div class="leaf leaf5"></div>
      <div class="leaf leaf6"></div>
    </div>

    <script src="{{ asset('/js/form.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script>

      const title = document.querySelector('#email');
      const slug = document.querySelector('#slug')
      
      title.addEventListener('change', function() {
        fetch('/upload/slug?title=' + title.value).then(response => response.json()).then(data => slug.value = data.slug)
      });

      </script>

    
</body>
</html>