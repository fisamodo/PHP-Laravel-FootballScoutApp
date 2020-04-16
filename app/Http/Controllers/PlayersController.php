<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \GuzzleHttp\Client;

class PlayersController extends Controller
{
    public function index(){
        $title = 'Welcome to Laravel';
        return view('pages.index')->with('title',$title);
    }
    public function about(){
        $title='about us';
        return view('pages.about')->with('title', $title);
    }
    public function services(){
        $data = array(
            'title' => 'Services',
            'services' => ['Scouting','Progressing','Data Analysis']

        );
        return view('pages.services')->with($data);
    }
    public function getApiData(){

        $fixtures = json_decode(file_get_contents('C:\xampp\htdocs\playerTracker\public\jsonData\fixtures.json'));

        
        foreach($fixtures->rounds as $mydata){
            echo $mydata->name . "\n";
         foreach($mydata->matches as $matches)
         {
              echo $matches->date . "<br>";
              echo $matches->team1->name. '--';
              echo $matches->team1->code . "<br>";
              echo $matches->team2->name. '--';
              echo $matches->team2->code . "<br>";
              echo $matches->score1 . "<br>";
              echo $matches->score2 . "<br>";

         }
    } 
        
    }
}
