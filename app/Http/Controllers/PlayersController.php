<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \GuzzleHttp\Client;
use App\Get;
use Dompdf\Dompdf;
use DB;


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

        $fixtures = json_decode(file_get_contents('C:\xampp\htdocs\playerTracker\public\jsonData\fixtures.json'),true);
        //echo $fixtures->name . "\n";
        return view('pages.fixtures')->with('fixtures', $fixtures);
        
        
    }
    
}
