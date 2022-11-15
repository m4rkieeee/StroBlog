{{--Grab the app layout that is in views/layouts folder to load navbar etc..--}}
@extends('layouts.app')
{{--Give the page a title--}}
@section('title')
    Home
@endsection
{{--This is where the content goes, check layouts/app.blade.php folder and you'll understand.--}}
@section('content')
    {{--If there's posts, continue to run the foreach code, if not, don't display, diplaying this without data will error out the page--}}
    @if($post)
        {{--Show every instance of $post as $posts to use in the page, this will grab selected date from every row in the database like title and display it.--}}
    @foreach($post as $posts)
<article>
    <h1><a href="{{ route('post.get', "$posts->id") }}" name="post_id" >{{ $posts->title }}</a></h1>
    <p>Posted by <b>{{ $posts->user->name }}</b> on <b>{{ $posts->created_at->format('d F Y, H:i') }}</b></p>
    <hr>
    <p> {{ Str::words($posts->text, 100) }}</p>
</article>
{{--Ofcourse, we have to end every statement we put above marked by the @ sign.--}}
@endforeach
    @endif
@endsection
