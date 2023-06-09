<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Richiesta revisor</title>
</head>
<body>
    <h1>Richiesta revisore</h1>
    <h2>Nome utente: {{$user->name}}</h2>
    <h3>email: {{$user->email}}</h3>

    <a href='{{route('make.revisor', compact('user'))}}'>Rendi revisore</a>

    
</body>
</html>