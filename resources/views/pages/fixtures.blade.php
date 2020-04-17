@extends('layouts.app')

@section('content')
<div class="container">
    <h2 style="text-align: center;">{{$fixtures['name']}}</h2>
    @foreach($fixtures['rounds'] as $rounds)
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Team 1</th>
                <th scope="col">Team 2</th>
                <th scope="col">Result</th>
              </tr>
        </thead>
        @foreach($rounds['matches'] as $matches)
        <tbody>
          <tr>
            <th scope="row">{{$matches['date']}}</th>
            <td style="width:250px">{{$matches['team1']['name']}}</td>
            <td style="width:250px">{{$matches['team2']['name']}}</td>
            @if($matches['score1']===null)
            <td>To be</td>
            @else
            <td>{{$matches['score1']}}--{{$matches['score2']}}</td>
            @endif
          </tr>
          @endforeach
          @endforeach
        </tbody>
    </div>
        
    

@endsection
