<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('appearance','desc')->paginate(10);

        // $posts = Post::orderBy('title','desc')->take(1)->get();
        // $posts = Post:all();
        // $posts = DB::select('SELECT * FROM posts');
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'fullName' => 'required',
            'Nationality' =>'required', 
            'appearance' => 'required',
            'goals' => 'required',
            'assists' => 'required',
            'age' => 'required',
            'Position' => 'required'
        ]);

        

        $post = new Post;
        $arrayToString = implode(',', $request->input('Speciality'));
        $inputValue['Speciality'] = $arrayToString;
        $post->Speciality = $inputValue['Speciality'];

        $arrayToString = implode(',', $request->input('Position'));
        $inputValue['Position'] = $arrayToString;
        $post->Position = $inputValue['Position'];


        $post->fullName = $request->input('fullName');
        $post->Nationality = $request->input('Nationality');
        $post->Leauge = $request->input('Leauge');
        $post->Club = $request->input('Club');
        $post->appearance = $request->input('appearance');
        $post->goals = $request->input('goals');
        $post->assists = $request->input('assists');
        $post->user_id = auth()->user()->id;
        
        $post->age = $request->input('age');
        $post->save();
        
        return redirect('/posts')->with('success','Post Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'fullName' => 'required',
            'Nationality' =>'required', 
            'appearance' => 'required',
            'goals' => 'required',
            'assists' => 'required',
            'age' => 'required',
            'Position' => 'required'
        ]);

        

        $post = Post::find($id);
        $arrayToString = implode(',', $request->input('Speciality'));
        $inputValue['Speciality'] = $arrayToString;
        $post->Speciality = $inputValue['Speciality'];

        $arrayToString = implode(',', $request->input('Position'));
        $inputValue['Position'] = $arrayToString;
        $post->Position = $inputValue['Position'];


        $post->fullName = $request->input('fullName');
        $post->Nationality = $request->input('Nationality');
        $post->Leauge = $request->input('Leauge');
        $post->Club = $request->input('Club');
        $post->appearance = $request->input('appearance');
        $post->goals = $request->input('goals');
        $post->assists = $request->input('assists');
        
        $post->age = $request->input('age');
        $post->save();
        
        return redirect('/posts')->with('success','Post Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts')->with('success','Post Removed');

    }
}
