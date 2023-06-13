<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>({{route('ui.requestRevisorTitle')}})</title>
</head>
<body>
    <h1>({{route('ui.requestRevisor')}})</h1>
    <h2>({{route('ui.userNameRevisor')}}): {{$user->name}}</h2>
    <h3>({{route('ui.emailRevisor')}}): {{$user->email}}</h3>

    <a href='{{route('make.revisor', compact('user'))}}'>({{route('ui.requestRevisorButton')}})</a>

    
</body>
</html>