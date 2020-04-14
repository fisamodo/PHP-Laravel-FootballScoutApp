@extends('layouts.app')

@section('content')

    <h1>Posts</h1>
    <a href="/" class="btn btn-default">Go back</a>
    <hr>

    @if(count($posts)>0)
        @foreach($posts as $post)
            <div class="well">
            <h3><a href="/posts/{{$post->id}}">{{$post->fullName}}</a></h3>
             <div>
             <li>{{$post->Nationality}} Nationality</li>
             <li>{{$post->Leauge}}</li>
             <li>{{$post->Club}}</li>
             </div>   
             
             <small>Scouted at {{$post->created_at}} by {{$post->user->name}}</small>
            </div>
        @endforeach
    @else
        <p>No posts found<p>
    @endif
@endsection