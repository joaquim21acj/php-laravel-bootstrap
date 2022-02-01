<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class TableRequests extends Controller
{
    protected $requestsResponse;
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
        $requestsResponse = $this->loadData();
        return view('tableRequests', ['requestsResponse' => $requestsResponse]);
    }

    private function loadData() {
        try {
            $json = file_get_contents("http://localhost:3000/requests-success");
            $requestsResponse = json_decode($json);
            return $requestsResponse;
        } catch (Exception $e) {
            return [];
        }
    }
}