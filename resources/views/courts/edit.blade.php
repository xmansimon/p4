@extends('layouts.master')

@section('title')
    Edit {{$court->title}}
@endsection

@section('content')

    @if(count($errors) > 0)
        <div class='alert'>
            Please correct the errors below.
        </div>
    @endif

    <h1>Edit {{ $court->title }}</h1>

    <form method='POST' action='/tennis/{{ $court->id }}'>
        <div class='details'>* Required fields</div>

        {{ method_field('put') }}
        {{ csrf_field() }}

        <label for='title'>* Title</label>
        <input type='text' name='title' id='title' value='{{ old('title', $court->title) }}'>
        @include('modules.field-error', ['field' => 'title'])

        <label for='type'>* Court Type</label>
        <label class="radio-inline"><input type='radio'name='type' value='indoor'  {{(old('type',$court->type) == "indoor")? 'checked' : ''}} > indoor</label>
        <label class="radio-inline"><input type='radio'name='type' value='outdoor' {{(old('type',$court->type) == "outdoor")? 'checked' : ''}}> outdoor</label>
        @include('modules.field-error', ['field' => 'type'])


        <label for='street'>* Street address </label>
        <input type='text' name='street' id='street' value='{{ old('street',$court->street)}}'>
        @include('modules.field-error', ['field' => 'street'])

        <label for='city'>* City </label>
        <input type='text' name='city' id='city' value='{{ old('city', $court->city) }}'>
        @include('modules.field-error', ['field' => 'city'])


        <label for='zip'>* Zip </label>
        <input type='text' name='zip' id='zip' value='{{ old('zip',$court->zip)}}'>
        @include('modules.field-error', ['field' => 'zip'])


        <label for='link_url'>* Official Website</label>
        <input type='text'
               name='link_url'
               id='link_url'
               value='{{ old('link_url', $court->link_url)}}'>
        @include('modules.field-error', ['field' => 'link_url'])



        <input type='submit' value='Save changes' class='btn btn-primary'>
    </form>


@endsection