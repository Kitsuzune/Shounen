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
  </head>
  <body>


    <div class="containerinti"><br>
        <div class="h1 text-center" > 
          <h1 class="display-3">Shounen Data</h1> 
          <br>
          <div class="d-flex justify-content-center">
            {!! $TotalUser->container() !!}
            {!! $TotalUser2->container() !!}
          </div>
          <br>       
        
        </div>
    </div>



        <script src="{{ $TotalUser->cdn() }}"></script>
        <script src="{{ $TotalUser2->cdn() }}"></script>

        {{ $TotalUser->script() }}
        {{ $TotalUser2->script() }}
        
  </body>
</html>