@extends('layouts.master')

@section('title')
    {{ $court->title }}
@endsection

@push('head')
    <link href='/css/books/show.css' rel='stylesheet'>

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
            <li><a href='{{ $court->link_url }}'><i class="fas fa-external-link-alt"></i> Official Website</a>
            <li><a href='/tennis/{{ $court->id }}/add'><i class="fas fa-trash-alt"></i> Add Player</a>
            <li><a href='/tennis/{{ $court->id }}/edit'><i class="fas fa-pencil-alt"></i> Edit</a>
            <li><a href='/tennis/{{ $court->id }}/delete'><i class="fas fa-trash-alt"></i> Delete</a>
        </ul>
    </div>
@endsection








