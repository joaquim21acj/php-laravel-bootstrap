<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class HomeController extends Controller
{
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
            return view('home', ['time' => var_dump(json_decode($json))]);
        } catch (Exception $e) {
            return  view('home', ['time' => 'Please try again later']);
        }
    }

    // public function gettimestamp(Request $request)
    // {
    //     try {
    //         $json = file_get_contents("http://localhost:3000/");
    //         return view('requisitions', ['time' => var_dump(json_decode($json))]);
    //     } catch (Exception $e) {
    //         return  view('requisitions', ['time' => 'Please try again later']);
    //     }
    // }
}
