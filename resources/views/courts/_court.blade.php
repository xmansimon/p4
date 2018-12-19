<div class='book cf'>
    <a href='/tennis/{{ $court->id }}'><h3>{{ $court->title }}</h3></a>
    <ul>
        <li>Located at {{ $court->street }}, {{ $court->city }}, {{ $court->zip }}</li>
    </ul>
</div>