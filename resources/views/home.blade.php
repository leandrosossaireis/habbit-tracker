<h1>
    Olá
</h1>

<p>
    Olá {{$name}}, vejo que você gosta de 
    <ul>
        @foreach($habits as $item)
            <li>{{$item}}</li>
        @endforeach
    </ul>
</p>