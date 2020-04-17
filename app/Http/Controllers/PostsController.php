<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Storage;
use DB;

class PostsController extends Controller
{

/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth',['except' => ['index','show']]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //$posts = Post::orderBy('appearance','asc')->paginate(10);
        $posts = Post::orderBy('fullName','asc')->get();
        


        // $posts = Post::orderBy('title','desc')->take(1)->get();
         //$posts = Post:all();
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
            'cover_image' => 'image|nullable||max:1999' ,
            'appearance' => 'required',
            'goals' => 'required',
            'assists' => 'required',
            'age' => 'required',
            'Position' => 'required',
            'ScoutLog' => 'required'
        ]);

        

        $post = new Post;
        //Handle File Upload
        if($request->hasFile('cover_image')){
            //GET filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }else{
            $fileNameToStore ='noimage.jpg';
        }

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
        $post->cover_image = $fileNameToStore;
        $post->age = $request->input('age');
        $post->ScoutLog = $request->input('ScoutLog');
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
        //Checking for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error','Unauthorized Page');

        }
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
            'Position' => 'required',
            'cover_image' =>'image|nullable|max:1999'
        ]);

        //Handle File Upload
        if($request->hasFile('cover_image')){
            //GET filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }
        

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
        $post->ScoutLog = $request->input('ScoutLog');

        $post->assists = $request->input('assists');
        $post->age = $request->input('age');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }

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
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error','Unauthorized Page');

        }

        if($post->cover_image !='noimage.jpg'){
            Storage::delete('public/cover_images/'.$post->cover_image);
        }

        $post->delete();
        return redirect('/posts')->with('success','Post Removed');

    }
}
