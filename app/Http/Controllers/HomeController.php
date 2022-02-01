<?php

namespace App\Http\Controllers;

use Exception;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $dateEEST = '';
    protected $time;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function gettimestamp(Request $request)
    {
        try {
            $json = file_get_contents("http://localhost:3000/");
            $timestampResponse = json_decode($json);
            $this->dateEEST = new DateTime("@".$timestampResponse->Timestamp); 
            $this->dateEEST->setTimezone(new DateTimeZone('Europe/Riga'));
            return view('home', ['time' => $timestampResponse->Timestamp, 'dateEEST' => $this->dateEEST->format('Y-m-d H:i:s e')]);
        } catch (Exception $e) {
            var_dump($e);
            return  view('home', ['time' => 'Please try again later']);
        }
    }
}
