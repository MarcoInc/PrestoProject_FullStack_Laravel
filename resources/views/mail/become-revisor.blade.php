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
    <h2><strong class="emailCustom">Email:</strong>  {{$user->email}}</h2>
    <h3><strong class="emailCustom">Name:</strong>   {{$user->name}}</h3>

    <a class="emailCustom" href='{{route('make.revisor', compact('user'))}}'>({{__('ui.requestRevisorButton')}})</a>

    
</body>
</html>