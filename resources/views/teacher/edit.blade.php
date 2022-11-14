<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change infomation</title>

</head>
<body>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


<nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
    <a class="navbar-brand" href="{{route('home')}}">Welcome {{$data->username}}</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb" aria-expanded="true">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div id="navb" class="navbar-collapse collapse hide">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">Home</a>
            </li>
            @if ($data->type != 'student')
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('student')}}">Xem sv</a>
                </li>
            @endif

            <li class="nav-item active">
                <a class="nav-link" href="{{url('profile/'.$data->id)}}">Profile</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{route('viewall')}}">Xem user</a>
            </li>

        </ul>

        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{route('logout')}}"><span class="fas fa-sign-in-alt"></span> Log Out</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container" style=" padding-left: 500px">

    <form action="{{url('/edit/'.$user->id)}}" method="post" enctype="multipart/form-data">
        <div class="row" style="padding-left: 50px" >

        </div>
        <label for="username">Username</label><br>
        <input type="text" name="username" value="{{$user->username}}" ><br>
        <label for="name">Name</label><br>
        <input type="text"  name="fullname" value="{{$user->fullname}}" ><br>
        <label for="phone">Password</label><br>
        <input type="password" name="password" value="{{$user->password}}"><br>
        <label for="email">Email</label><br>
        <input type="text" name="email" value="{{$user->email}}"><br>
        <label for="phone">Phone number</label><br>
        <input type="text" name="phone" value="{{$user->phone}}"><br>

        <input type="submit" class="changeInfo" value="Save info" name="update">
    </form>
</div>


</body>
</html>


