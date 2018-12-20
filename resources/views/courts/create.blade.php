@extends('layouts.master')

@section('title')
    Add a court
@endsection

@section('content')

    @if(count($errors) > 0)
        <div class='alert'>
            Please correct the errors below.
        </div>
    @endif

    <h1>Add a court</h1>

    <form method='POST' action='/tennis'>
        <div class='details'>* Required fields</div>
        {{ csrf_field() }}

        <label for='title'>* Title</label>
        <input type='text' name='title' id='title' value='{{ old('title') }}'>
        @include('modules.field-error', ['field' => 'title'])

        <label for='type'>* Court Type</label>
        <label class="radio-inline"><input type='radio'name='type' value='indoor'  {{(old('type') == "indoor")? 'checked' : ''}} > indoor</label>
        <label class="radio-inline"><input type='radio'name='type' value='outdoor' {{(old('type') == "indoor")? 'checked' : ''}}> outdoor</label>
        @include('modules.field-error', ['field' => 'type'])

        <label for='street'>* Street address </label>
        <input type='text' name='street' id='street' value='{{ old('street') }}'>
        @include('modules.field-error', ['field' => 'street'])

        <label for='city'>* City </label>
        <input type='text' name='city' id='city' value='{{ old('city') }}'>
        @include('modules.field-error', ['field' => 'city'])


        <label for='zip'>* Zip </label>
        <input type='text' name='zip' id='zip' value='{{ old('zip') }}'>
        @include('modules.field-error', ['field' => 'zip'])


        <label for='link_url'>* Official Website</label>
        <input type='text'
               name='link_url'
               id='link_url'
               value='{{ old('link_url') }}'>
        @include('modules.field-error', ['field' => 'link_url'])



        <input type='submit' value='Add' class='btn btn-primary'>
    </form>


@endsection