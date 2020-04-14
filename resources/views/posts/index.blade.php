@extends('layouts.app')

@section('content')

    <h1>Posts</h1>
    <a href="/" class="btn btn-default">Go back</a>
    <hr>

    @if(count($posts)>0)
        @foreach($posts as $post)
            <div class="well">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <h3><a href="/posts/{{$post->id}}">{{$post->fullName}}</a></h3>
                        <li>{{$post->Nationality}} Nationality</li>
                            <li>{{$post->Leauge}}</li>
                            <li>{{$post->Club}}</li>    
                            <small>Scouted at {{$post->created_at}} by {{$post->user->name}}</small>
                    </div>
                    <div class="col-md-6 col-sm-6" style="text-align:right;">
                        <img style="width:50%;"    src ="/storage/cover_images/{{$post->cover_image}}">

                    </div>
            
                </div>
            </div>
        @endforeach
    @else
        <p>No posts found<p>
    @endif
@endsection