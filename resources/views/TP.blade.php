<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    {{-- Q1 --}}
    @foreach ($stagiaires as $stagiaire)
        <h1>{{ $stagiaire->nom }}</h1>
    @endforeach

    {{-- Q2 --}}
    @foreach ($stagiaire as $stg)
        <p>{{ $stg }}</p>
    @endforeach 

    {{-- Q3 --}}
    <h1>{{ $nomsPrenoms }}</h1> 

</body>
</html>