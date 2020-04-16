@extends('layouts.app')

@section('content')



@foreach($fixtures['rounds'] as $rounds)
    {{$rounds['name']}} <br>
    <div class="table">
        
        <div class="row">
    @foreach($rounds['matches'] as $matches)
    <div class="cell">
    {{$matches['date']}} <br>
    {{$matches['team1']['name']}} <br>
    {{$matches['team1']['code']}} <br>
    {{$matches['team2']['name']}} <br>
    {{$matches['team2']['code']}} <br>
    @if($matches['score1']===null)
    <h4>To be played</h4>
    @else
    {{$matches['score1']}} <br>
    {{$matches['score2']}} <br>
    </div>
    @endif
@endforeach
@endforeach

@endsection
