<!DOCTYPE html>
<html lang="en">
    <head>
        <!--Required meta tags-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Account Setting</title>
        <!--Bootstrap CSS-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
        <script src="https://kit.fontawesome.com/07a69f92d2.js" crossorigin="anonymous"></script>
        <style>
            body{
                background-color: #fff;
            }
        </style>
    </head>
    <body>
        <div class="container account">
            <div class="">
                <div class="">
                    @if (Session::has('success'))
                        <strong style="color: green">{{ Session::get('success') }}</strong>
                    @endif
                    <div class="avatar mx-auto">
                        <form class="form" id = "form" action="" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="upload">
                                <img id="image"  src="{{ Auth::user()->avatar ? Storage::url(Auth::user()->avatar): "https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" }}" alt="your image" class="img-fluid"/>

                              <div class="rightRound" id = "upload">

                                <i class="fa-solid fa-camera"></i>
                              </div>

                              <div class="leftRound" id = "cancel" style = "display: none;">
                                <i class = "fa fa-times"></i>
                              </div>
                              <div class="rightRound" id = "confirm" style = "display: none;">
                                <input type="submit">
                                <i class = "fa fa-check"></i>
                              </div>
                            </div>
                        </form>
                    </div>
                    <h3>{{ Auth::user()->name }}</h3>
                    <hr>
                <div class="">
                    <h3>Thông tin tài khoản</h3>
                        @if (Session::has('success_profile'))
                            <strong style="color: green">{{ Session::get('success_profile') }}</strong><br>
                        @endif
                    <form action="{{route('update_profile')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="">
                            <label for="" class="form-label">Họ tên</label>
                            <input type="text" name="fullname" class="form-control" value="{{ Auth::user()->fullname }}">
                            <span class="@error('fullname') is-valid  @enderror" style="color: red" >{{ $errors->first('fullname') }}</span>
                        </div>

                            <div class="col-lg-12 col-sm-12">
                                <label for="" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                                <span class="@error('email') is-valid  @enderror" style="color: red" >{{ $errors->first('email') }}</span>
                            </div>
                            <div class="col-lg-12 col-sm-12">
                                <label for="" class="form-label">User Name</label>
                                <input type="text" name="username" class="form-control" value="{{ Auth::user()->username }}">
                                <span class="@error('username') is-valid  @enderror" style="color: red" >{{ $errors->first('username') }}</span>

                            </div>

                        <div class=" btn_ud_profile" >
                            <button class="btn btn-primary ">Save</button>
                            <a href="{{ route('movie') }}" class="btn btn-primary">Trang chủ</a>
                        </div>
                    </form>
                </div>
            </div>


        </div>
        <script type="text/javascript">
            document.getElementById("fileImg").onchange = function(){
              document.getElementById("image").src = URL.createObjectURL(fileImg.files[0]); // Preview new image

              document.getElementById("cancel").style.display = "block";
              document.getElementById("confirm").style.display = "block";

              document.getElementById("upload").style.display = "none";
            }

            var userImage = document.getElementById('image').src;
            document.getElementById("cancel").onclick = function(){
              document.getElementById("image").src = userImage; // Back to previous image

              document.getElementById("cancel").style.display = "none";
              document.getElementById("confirm").style.display = "none";

              document.getElementById("upload").style.display = "block";
            }
        </script>
        <!--Optional JavaScript-->
        <!--jQuery first, then Popper.js, then Bootstrap JS-->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    </body>
</html>
