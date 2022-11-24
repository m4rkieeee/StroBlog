{{--Grab the app layout that is in views/layouts folder to load navbar etc..--}}
@extends('layouts.app')
{{--Give the page a title--}}
@section('title')
    Create
@endsection
{{--This is where the content goes, check layouts/app.blade.php folder and you'll understand.--}}
@section('content')
    <article>
    <form action="/post/store" method="POST">
        @csrf
        <label for="title">Title:</label><br>
        <input type="text" class="form-control" id="title" name="title"><br>
        <label for="text">Text:</label>
        <textarea class="form-control" id="text" name="text" rows="20" cols="50"></textarea>
        <hr>
        <input type="submit" class="btn btn-primary" value="Submit">
        <br>
        <br>
    </form>
    </article>
        {{--Ofcourse, we have to end every statement we put above marked by the @ sign.--}}
@endsection
