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

    @php( $user = auth()->user())

    <div class="containerinti"><br>
        <div class="h1 text-center" > 
          <h1 class="display-3">{{ $user->first_name}} {{ $user->last_name }} Profil</h1> 
          <br>
          <div class="d-flex justify-content-center">
            {{-- {!! $totalUser->container() !!}
            {!! $totalUser2->container() !!} --}}

            <div class="text-center">
              <h1 class="display-3">Profil user</h1>
              <table class="table table-bordered">
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
          </div>
          
          </div>
          

          </div>
          <br>       
        
        </div>
    </div>


{{-- 
        <script src="{{ $totalUser->cdn() }}"></script>
        <script src="{{ $totalUser2->cdn() }}"></script>

        {{ $totalUser->script() }}
        {{ $totalUser2->script() }}
         --}}
  </body>
</html>