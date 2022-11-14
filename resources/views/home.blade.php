@extends('layouts.app')
@section('title')
    Home
@endsection
@section('content')
    @foreach($post as $posts)
<article>
    <h1> {{ $posts->title }} </h1>
    <p>Posted by <b>{{ $posts->user->name }}</b> on <b>{{ $posts->created_at->format('d F Y, H:i') }}</b></p>
    <hr>
    <p> {{ $posts->text }}</p>
</article>
@endforeach
@endsection
