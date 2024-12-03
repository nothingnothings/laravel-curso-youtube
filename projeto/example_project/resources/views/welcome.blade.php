@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')
<body>
    <h1>Algum título</h1>
    @if($nome === "Arthur")
    <p>{{ $nome }}</p>

    @elseif($nome === "Pedro")
    <p>O nome é outro </p>

    @else
    <p>O nome é ainda outro</p>

    @endif


    @for ($i = 0; $i < count($someArray); $i++) {{-- <p>{{ $someArray[$i] }}</p> --}}
        @if($someArray[$i] === 2)
        <p>O valor é igual a 3</p>

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

            <img src="/img/banner.jpg" alt="Laravel">
</body>
</html>
@endsection
