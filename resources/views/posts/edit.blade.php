@extends('layouts.app')

@section('content')

    <h1>Edit</h1>
    {!! Form::open(['action'=>['PostsController@update',$post->id],'method'=>'POST']) !!}
    <div class="form-group">
        {{Form::label('fullName', 'Full Name')}}
        {{Form::text('fullName',$post->fullName, ['class' => 'form-control', 'placeholder' =>'Full Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('Nationality', 'Nationality')}}
        {{Form::text('Nationality',$post->Nationality, ['class' => 'form-control', 'placeholder' =>'Nationality'])}}
    </div>
    <div class="form-group">
        {{Form::label('Leauge', 'Leauge')}}
        {{Form::text('Leauge',$post->Leauge, ['class' => 'form-control', 'placeholder' =>'Leauge'])}}
    </div>
    <div class="form-group">
        {{Form::label('Club', 'Club')}}
        {{Form::text('Club',$post->Club, ['class' => 'form-control', 'placeholder' =>'Club'])}}
    </div>
    <div class="form-group">
        {{Form::label('appearance', 'Number of Appearances')}}
        {{Form::number('appearance',$post->appearance, ['class' => 'form-control', 'placeholder' =>'Number of Appearances'])}}
    </div>
    <div class="form-group">
        {{Form::label('goals', 'Number of Goals')}}
        {{Form::number('goals',$post->goals, ['class' => 'form-control', 'placeholder' =>'Number of goals'])}}
    </div>
    <div class="form-group">
        {{Form::label('assists', 'Number of Assists')}}
        {{Form::number('assists',$post->assists, ['class' => 'form-control', 'placeholder' =>'Number of Assists'])}}
    </div>
    <div class="form-group" >
        <label class="form-check-label" style="margin-right:50px;" > <h3>Special Attributes</h3>
        <input class="form-check-input" value="No Speciality" type="checkbox" name="Speciality[]" checked> No Speciality <br> 
        <input class="form-check-input" value="Strength" type="checkbox" name="Speciality[]"> Strength <br>
        <input class="form-check-input" value="Composure" type="checkbox" name="Speciality[]"> Composure <br>
        <input class="form-check-input" value="Game Decider" type="checkbox" name="Speciality[]"> Game Decider <br>
        <input class="form-check-input" value="Free Kick Specialist" type="checkbox" name="Speciality[]"> Free Kick Specialist <br>
        <input class="form-check-input" value="Agile" type="checkbox" name="Speciality[]"> Agile <br>
        <input class="form-check-input" value="Defensive Rock" type="checkbox" name="Speciality[]"> Defensive Rock <br>
        <input class="form-check-input" value="Sweeper" type="checkbox" name="Speciality[]"> Sweeper <br>
        <input class="form-check-input" value="Young prospect" type="checkbox" name="Speciality[]"> Young prospect <br>
        <input class="form-check-input" value="Maestro" type="checkbox" name="Speciality[]"> Maestro <br>
        <input class="form-check-input" value="Initiator" type="checkbox" name="Speciality[]"> Initiator <br>
        <br>

        </label>
    
        <label class="form-check-label"> <h3>Position</h3> 
        <input class="form-check-input" value="GK" type="checkbox" name="Position[]"> Goalkeeper <br>
        <input class="form-check-input" value="LB" type="checkbox" name="Position[]"> Left Fullback <br>
        <input class="form-check-input" value="CB" type="checkbox" name="Position[]"> Centre Back <br>
        <input class="form-check-input" value="RB" type="checkbox" name="Position[]"> Right Fullback <br>
        <input class="form-check-input" value="CDM" type="checkbox" name="Position[]"> Defensive Midfielder <br>
        <input class="form-check-input" value="CM" type="checkbox" name="Position[]"> Central Midfielder <br>
        <input class="form-check-input" value="CAM" type="checkbox" name="Position[]"> Attacking Midfielder <br>
        <input class="form-check-input" value="RM" type="checkbox" name="Position[]"> Right Midfielder <br>
        <input class="form-check-input" value="LM" type="checkbox" name="Position[]"> Left Midfielder <br>
        <input class="form-check-input" value="RW" type="checkbox" name="Position[]"> Right Winger <br>
        <input class="form-check-input" value="CF" type="checkbox" name="Position[]"> Central Forward <br>
        <input class="form-check-input" value="LW" type="checkbox" name="Position[]"> Left Winger <br>
        </label>
    
    <div>
    <div class="form-group">
        {{Form::label('age', 'Years of Age')}}
        {{Form::number('age',$post->age, ['class' => 'form-control', 'placeholder' =>'Years of Age'])}}
    </div>
    <div class="form-group">
        {{Form::label('ScoutLog', 'Scout Log')}}
        {{Form::textarea('ScoutLog',$post->ScoutLog, ['class' => 'form-control', 'placeholder' =>'Career Hightlights'])}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
    
@endsection