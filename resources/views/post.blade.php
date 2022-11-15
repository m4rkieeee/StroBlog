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
            <article>
                <h1> {{ $post->title }} </h1>
                <p>Posted by <b>{{ $post->user->name }}</b> on <b>{{ $post->created_at->format('d F Y, H:i') }}</b>
                    @auth
                    @if(Auth::user()->name == $post->user->name)
                        <form action="{{ url('post/destroy', $post->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                        <a role="button" class="btn btn-sm btn-warning" style="color: white;" href="{{ url('edit', $post->id) }}">Change</a>
                    @endif
                    @endauth
                </p>
                <hr>
                <p> {{ $post->text }}</p>
            </article>
            {{--Ofcourse, we have to end every statement we put above marked by the @ sign.--}}
    @endif
@endsection
