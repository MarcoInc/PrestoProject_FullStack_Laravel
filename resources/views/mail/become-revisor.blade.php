<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>({{__('ui.requestRevisorTitle')}})</title>
</head>
<body>
    <h1>({{__('ui.requestRevisor')}})</h1>
    <h2>({{__('ui.userNameRevisor')}}): {{$user->name}}</h2>
    <h3>({{__('ui.emailRevisor')}}): {{$user->email}}</h3>

    <a href='{{route('make.revisor', compact('user'))}}'>({{__('ui.requestRevisorButton')}})</a>

    
</body>
</html>