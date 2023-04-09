<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/flickity.css') }}">
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
.gallery {
    display: flex;
    flex-wrap: wrap;
    margin: -1rem -1rem;
    padding-bottom: 3rem;
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

    .rebutton {
        background-color: #4CAF50;
        color: white;
        width: 80px;
        height: 40px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 10px;
        cursor: pointer;
        border-radius: 5px;
        justify-content: center;
        align-items: center;
      }
      
      /* Button hover effect */
      .rebutton:hover {
        background-color: #3e8e41;
      }
    </style>
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
                    <a href="\">Home</a>
                </li>
                
                <li>
                    <a href="#" class="active">My Post</a>
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

<div class="row">
    @foreach($posts as $post)
    <div class="col-md-4 mb-3">
        <div class="gallery-item picture-container" tabindex="0" data-toggle="modal" data-target="#pictureModal{{ $post->id }}" data-image="{{ asset('storage/'. $post->image) }}">
            <img src="{{ asset('storage/'. $post->image) }}" alt="{{ $post->title }}" class="gallery-image" style="max-height: 250px;">
        </div>
    </div>
    @endforeach
</div>

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

                    <div>
                        <form action="/user/post/{{ $post->slug }}/delete" method="post">
                            @csrf
                        <button class="rebutton" type="submit" onclick="return confirm('yakin?')">hapus</button>
                        </form>
                    </div>
                    <div>
                        <a href="/user/post/{{ $post->slug }}/edit" class="rebutton">edit</a>
                    </div>
                </div>
              
            </div>
        </div>
    </div>
</div>

@endforeach
{{ $posts->links() }}

</div>

<!-- Script -->
<script>
$('.picture-container').on('click', function() {
    var image = $(this).data('image'); // Get the image path from data-image attribute
    var modalId = $(this).data('target'); // Get the modal ID from data-target attribute
    $(modalId).find('img').attr('src', image); // Set the image source in the modal
});
</script>
</body>
</html>