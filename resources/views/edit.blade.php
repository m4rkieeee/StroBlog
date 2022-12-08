{{--Grab the app layout that is in views/layouts folder to load navbar etc..--}}
@extends('layouts.app')
{{--Give the page a title--}}
@section('title')
    Post {{ $post->id }}
@endsection
{{--This is where the content goes, check layouts/app.blade.php folder and you'll understand.--}}
@section('content')
    {{--If there's posts, continue to run the foreach code, if not, don't display, diplaying this without data will error out the page--}}
    @if($post)
        {{--Show every instance of $post as $posts to use in the page, this will grab selected date from every row in the database like title and display it.--}}
        <form class="form-group" method="post" action="{{url('update-data/'.$post->id)}}">
        <article>
            <h1><textarea class="form-group" name="editTitle" id="editTitle" rows="1" style="text-align: center">{{ $post->title }}</textarea></h1>
            <p>Posted by <b>{{ $post->user->name }}</b> on <b>{{ $post->created_at->format('d F Y, H:i') }}
                </b>
            </p>
            <hr>
                @csrf
            <textarea class="form-group" name="editPost" id="editPost" rows="20" cols="50">{{$post->text}}</textarea>
            <input type="submit" class="btn btn-primary" value="Submit">
        </article>
        </form>
        {{--Ofcourse, we have to end every statement we put above marked by the @ sign.--}}
    @endif
@endsection
