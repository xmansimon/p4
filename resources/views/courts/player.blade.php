@extends('layouts.master')

@section('title')
    Edit {{$court->title}}
@endsection

@push('head')
    <link href='/css/tennis/addplayer.css' rel='stylesheet'>
@endpush

@section('content')

    @if(count($errors) > 0)
        <div class='alert'>
            Please correct the errors below.
        </div>
    @endif

    <h1>Add player at {{ $court->title }}</h1>

    <form method='POST' action='/player/{{ $court->id }}'>

        {{ method_field('put') }}
        {{ csrf_field() }}



        <p>Existing Player:
        <ul class=''>
            @foreach($playersAtCourt as $player)
                <li>{{ $player }}</li>
            @endforeach
        </p>
        </ul>

        <label for='name'>* Name </label>
        <input type='text' name='name' id='name' value='{{ old('name') }}'>
        @include('modules.field-error', ['field' => 'name'])


        <label for='level'>* Play Level </label>
        <input type='text' name='level' id='level' value='{{ old('level') }}'>
        @include('modules.field-error', ['field' => 'level'])


        <label for='email'>* Email </label>
        <input type='text' name='email' id='email' value='{{ old('email') }}'>
        @include('modules.field-error', ['field' => 'email'])



        <input type='submit' value='Add Player' class='btn btn-primary'>
    </form>


@endsection