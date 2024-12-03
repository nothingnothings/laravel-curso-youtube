<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif
</head>
<body>
    <h1>Algum título</h1>
    @if($nome === "Arthur") {
    <p>{{ $nome }}</p>
    }
    @elseif($nome === "Pedro") {
    <p>O nome é outro </p>
    }
    @else {
    <p>O nome é ainda outro</p>
    }
    @endif


    @for ($i = 0; $i < count($someArray); $i++) {{-- <p>{{ $someArray[$i] }}</p> --}}
        @if($someArray[$i] === 2) {
        <p>O valor é igual a 3</p>
        }
        @endif
        @endfor

        @php
        $name2 = "Pedro";
        echo $name2;

        @endphp
{{-- COMENTÁRIO DO BLADE, QUE NÃO APARECE NO HTML FINAL --}}


        @foreach($someNames as $name)
        <p>{{ $loop->index }}/p>
        <p>{{ $name }}</p>
        @endforeach

</body>
</html>
