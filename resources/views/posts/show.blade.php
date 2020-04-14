@php
    $gpa = number_format((float)($post->goals / $post->appearance),2,'.','');
    $gcpa = number_format((float)(($post->goals + $post->assists) / $post->appearance),2,'.','');


@endphp

@extends('layouts.app')
@section('content')
    <a href="/posts" class="btn btn-default">Go back</a>
    <h1>{{$post->fullName}}</h1><h3>{!!$post->age!!} Year of Age</h3> <h4>{!!$post->Nationality!!} Nationality</h4>
    <br>
    <h4>{!!$post->Leauge!!} : {!!$post->Club!!}</h4>
    <div style="width:70%">
       <h3><strong>Appearances:</strong> {!!$post->appearance!!}</h3>
        <h3><strong>Scored:</strong> {!!$post->goals!!}
        <h3><strong>Assisted:</strong> {!!$post->assists!!}</h3>
        <h3><strong>Goals Per Appearance:</strong> {!!$gpa!!}</h3>
        <h3><strong>Goal Contributions per Appearance:</strong> {!!$gcpa!!}</h3>
    </div>
    <br><br>
    <div style="width:70%">
        <h3><strong>Can play at positions:</strong> {!!$post->Position!!}</h3>
    </div>
    <div style="width:70%">
        <h3><strong>Known traits:</strong> {!!$post->Speciality!!} </h3>
    </div>
    <hr>
    <h4>Scout report made on {{$post->created_at}} by Certified Scout {{$post->user->name}}</h4>    <hr>
    
    <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>

    {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('Delete',['class'=> 'btn btn-danger'])}}
    {!!Form::close()!!}
    
@endsection