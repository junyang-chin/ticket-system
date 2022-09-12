<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->
    <!-- Option 1: Bootstrap Bundle with Popper 
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->


    <link rel="stylesheet" href="{{  Resources::asset('css/style.css') }}">
</head>

<body>
    <!-- start -->
    <main>
        <div class="py-5 text-center">
            <h2>Login</h2>
        </div>
        <form action="/api/login" method="POST" class="text-center">
            <div class="row text-center">
                <label for="password" class="col-sm-1">Email</label>
                <input class="col-sm-2" type="email" name="email" id="email">
            </div>
            <div class="row text-center">
                <label for="password" class="col-sm-1">Password</label>
                <input class="col-sm-2" type="password" name="password" id="password">
            </div>
            <button type="submit"> Submit </button>
        </form>
    </main>

    <!-- end -->
</body>

</html>