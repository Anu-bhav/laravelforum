<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function Index()
    {
        // return 'Index Page';
        $title = 'Welcome To Laravel!';
        //return view("pages.index", compact('title'));
        return view("pages.index")->with('title', $title);
    }

    public function About()
    {
        $title = 'About Us';
        //return view("pages.index", compact('title'));
        return view("pages.about")->with('title', $title);
    }

    public function Services()
    {
        // $title = 'Services';
        $data = array(
            'title' => 'Services',
            'services' => ['Web Design','Programming','Pentration Testing']
        );
        //return view("pages.index", compact('title'));
        return view("pages.services")->with($data);
    }
}
