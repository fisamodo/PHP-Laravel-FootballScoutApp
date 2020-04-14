@extends('layouts.app')

@section('content')

    <h1>Posts</h1>
    @if(count($posts)>0)
        @foreach($posts as $post)
            <div class="well">
            <h3><a href="/players/{{$post->id}}">{{$post->fullName}}</a></h3>
             <div style="text-align:right;" >
             <li>{{$post->appearance}} Appearances</li>
             <li>{{$post->goals}} Goals</li>
             <li>{{$post->assists}} Assists</li>
             </div>   
            </div>
        @endforeach
    @else
        <p>No posts found<p>
    @endif
@endsection