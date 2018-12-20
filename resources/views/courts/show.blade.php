@extends('layouts.master')

@section('title')
    {{ $court->title }}
@endsection

@push('head')
    <link href='/css/tennis/show.css' rel='stylesheet'>

@endpush

@section('content')
    <h1>{{ $court->title }}</h1>

    <div class='court cf'>
        <p>Located at {{ $court->street }}, {{ $court->city }}, {{ $court->zip }}</p>
        <p>Type: {{ $court->type }}</p>

        <p>
            Players at this court:
        @foreach($court->players as $player)
            <ul class='bookActions'><li><span class='player'>{{ $player->name }}</span></li></ul>
            @endforeach

        </p>

        <ul class='bookActions'>
            <li><a href='{{ $court->link_url }}'> Official Website</a>
            <li><a href='/player/{{ $court->id }}/add'> Add Player</a>
            <li><a href='/tennis/{{ $court->id }}/edit'>Edit</a>
            <li><a href='/tennis/{{ $court->id }}/delete'>Delete</a>
        </ul>
    </div>
@endsection








