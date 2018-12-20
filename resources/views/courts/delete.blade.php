@extends('layouts.master')

@push('head')
    <link href='/css/books/delete.css' rel='stylesheet'>
@endpush

@section('title')
    Confirm deletion: {{ $court->title }}
@endsection

@section('content')
    <h1>Confirm deletion</h1>

    <p>Are you sure you want to delete <strong>{{ $court->title }}</strong>?</p>


    <form method='POST' action='/tennis/{{ $court->id }}'>
        {{ method_field('delete') }}
        {{ csrf_field() }}
        <input type='submit' value='Delete!' class='btn btn-danger btn-small'>
    </form>

    <p class='cancel'>
        <a href='/tennis/{{ $court->id }}'>Cancel.</a>
    </p>

@endsection
