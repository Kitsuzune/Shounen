<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
        <div class="container">
            
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
  </body>
</html>