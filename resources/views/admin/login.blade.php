<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <title>Login</title>
</head>
<body>

    <div id="admin_login_page" class="container-fluid w-100 vh-100">
        <div class="row h-100">
            <div class="col h-100 d-flex justify-content-center align-items-center">
                <form action="{{ url('admin/login_process') }}" class="col-5 bg-white rounded" method="post">
                    @csrf
                    <h2 class="text-center py-4 logo"><span class="text-success logo">FISH</span>MART</h2>
                    <hr class="horizontal_line mt-0">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" id="email" placeholder="Enter Email id" class='form-control' required>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter Password" class='form-control' required>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="rememberme" id="" >
                        <label for="">Remember Me</label>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" name="login" id="" value="Login" class='btn btn-success bold' >
                    </div>
                    @if (session()->has('error'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>      
                    @endif
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</html>