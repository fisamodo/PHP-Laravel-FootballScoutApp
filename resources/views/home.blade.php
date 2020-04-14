@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>Your Scouted Player Register</h3></div>
                <a href="/posts/create" class="btn btn-success">Create Post</a>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @if(count($posts)>0)
                        <table class="table table-striped">
                            <tr>
                                <th>Full Name</th>
                                <th>Nationality</th>
                                <th>Appearances</th>
                            </tr>
                            @foreach($posts as $post)
                            <tr>
                            <td>{{$post->fullName}}</td>
                            <td>{{$post->Nationality}}</td>
                            <td>{{$post->appearance}}</td>

                                <td><a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a></td>
                                <td>
                                    {!!Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST','class' => 'float-right'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete',['class'=>'btn btn-outline-danger'])}}
                                    {!!Form::close()!!}
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        @else
                            <p>You have no posts</p>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
