<!DOCTYPE html>
<html lang="en">
<head>
    <!--Required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/auth.css') }}">
</head>
<body>
<div class="container">
    <div class="action mx-auto">
        <h1>Đăng Ký</h1>

        <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-12 col-sm-12">
                <label for="" class="form-label">FullName</label>
                <input type="text" name="fullname" class="form-control">
                <span class="@error('fullname') is-valid  @enderror" style="color: red" >{{ $errors->first('fullname') }}</span>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <label for="" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control">
                    <span class="@error('email') is-valid  @enderror" style="color: red" >{{ $errors->first('email') }}</span>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <label for="" class="form-label">UserName</label>
                    <input type="text" name="username" class="form-control">
                    <span class="@error('username') is-valid  @enderror" style="color: red" >{{ $errors->first('username') }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <label for="" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="col-lg-6 col-sm-12">
                    <label for="" class="form-label">Password Confirm</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
                <span class="@error('password') is-valid  @enderror" style="color: red" >{{ $errors->first('password') }}</span>
            </div>
            <div class="mb-3">
                <img id="anh_preview" src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" alt="your image"
                     style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                <input type="file" name="avatar" accept="image/*"
                       class="form-control-file @error('avatar') is-invalid @enderror" id="cmt_anh">
                <label for="cmt_anh">Image</label><br/>
                <span class="@error('avatar') is-valid  @enderror" style="color: red" >{{ $errors->first('avatar') }}</span>

            </div>
            <div class="btn_dk">
                <button class="btn btn-primary">Đăng Ký</button><br>
                <h6>Bạn đã có tài khoản? <a href="{{ route('login') }}">Đăng Nhập</a></h6>
            </div>
        </form>
    </div>
</div>
<!--Optional JavaScript-->
<!--jQuery first, then Popper.js, then Bootstrap JS-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
    $(function(){
        function readURL(input, selector) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function (e) {
                    $(selector).attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#cmt_anh").change(function () {
            readURL(this, '#anh_preview');
        });
    });
</script>
</body>
</html>
