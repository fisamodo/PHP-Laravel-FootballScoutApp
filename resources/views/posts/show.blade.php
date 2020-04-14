@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-default">Go back</a>
    <h1>{{$post->fullName}}</h1> 
    <br><br>
    <div style="width:70%">
        {!!$post->appearance!!}
    </div>
    <br><br>
    <div style="width:70%">
        {!!$post->goals!!}
        {!!$post->assists!!}
    </div>
    <br><br>
    <div style="width:70%">
        {!!$post->age!!}
    </div>
    <hr>
    <small>Written on {{$post->created_at}}</small>

@endsection