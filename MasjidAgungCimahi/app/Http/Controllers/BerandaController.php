<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->viewPrefix = 'Beranda';
        $this->title = "Beranda";
        $this->menu = "Beranda";
    }

    public function prefix($param = null)
    {
        $data['title'] = $this->title;
        $data['menu'] = $this->menu;

        if(isset($param)){
            foreach ($param as $index => $value) {
                $data[$index] = $value;
            }
        }

        return $data;
    }

    public function index(){

        $data['title'] = $this->title;
        $data['menu'] = $this->menu;

        return view($this->viewPrefix , $this->prefix($data));
    }
}
