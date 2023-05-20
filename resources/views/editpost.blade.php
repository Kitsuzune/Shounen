<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Your Image :3</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('/img/shounen-v.ico') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
        <div class="container">
            
            <div class="row align-items-center">
                <img src="{{ asset('storage/'. $post->image) }}" alt="{{ $post->title }}" class="gallery-image" style="max-height: 250px; max-width: 250px">

                <form method="POST" enctype="multipart/form-data" action="/user/post/{{ $post->slug }}/edit">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Title</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title" value="{{ $post->title }}"> 
                    @error('title')
                    <div class="text-danger">{{ $message }}</div>   
                    @enderror                   
                    </div>
                    <div class="mb-3">
                      <input type="text" class="form-control" id="slug" aria-describedby="emailHelp" name="slug" value="{{ $post->slug }}" hidden>                 
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">deskripsi</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" name="deskripsi" value="{{ $post->deskripsi }}">
                      @error('deskripsi')
                      <div class="text-danger">{{ $message }}</div>   
                      @enderror 
                    </div>
                  
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
          </div>

          @if(Session::has('hasil'))
          berhasil update

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