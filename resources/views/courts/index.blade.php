@extends('layouts.master')

@section('title')
    All Courts
@endsection

@push('head')
    <link href='/css/tennis/index.css' rel='stylesheet'>
    <link href='/css/tennis/_book.css' rel='stylesheet'>
@endpush

@section('content')
    <section id='newBooks'>
        <h2>Recently added courts</h2>
        <ul>
            @foreach($newCourts as $court)
                <li>{{ $court->title }}</li>
            @endforeach
        </ul>
    </section>
    <section id='allBooks'>
        <h2>All courts</h2>
        @foreach($courts as $court)
            @include('courts._court')
        @endforeach
    </section>
@endsection