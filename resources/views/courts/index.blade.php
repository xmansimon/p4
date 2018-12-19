@extends('layouts.master')

@section('title')
    All books
@endsection

@push('head')
    <link href='/css/books/index.css' rel='stylesheet'>
    <link href='/css/books/_book.css' rel='stylesheet'>
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
        <h2>All books</h2>
        @foreach($courts as $court)
            @include('courts._court')
        @endforeach
    </section>
@endsection