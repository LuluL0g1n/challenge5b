<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>All User</title>
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }

        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }

        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }

        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        td {
            font-weight: lighter;
        }
    </style>
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



<section>
    <h1>Thông tin User</h1>
    <!-- TABLE CONSTRUCTION-->
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Fullname</th>
            <th>Password</th>
            <th>Phone</th>
            <th>Message</th>
        </tr>
        <!-- PHP CODE TO FETCH DATA FROM ROWS-->
        @foreach ($user as $usr)
            <tr>
                <!--FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN-->
                <td>{{$usr->id}}</td>
                <td>{{$usr->username}}</td>
                <td>{{$usr->email}}</td>
                <td>{{$usr->fullname}}</td>
                <td>{{$usr->password}}</td>
                <td>{{$usr->phone}}</td>
                <td>{{$usr->message}}</td>
                <td><button class="btn btn-primary"> <a style="color: #f7f7f7" href="{{url('/message/'.$usr->id)}}"> Message </a></button></td>

            </tr>
        @endforeach

        }
    </table>
</section>

</body>

</html>
<?php
