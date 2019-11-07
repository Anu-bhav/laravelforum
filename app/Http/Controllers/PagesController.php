<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function Index()
    {
        // return 'Index Page';
        return view("pages.index");
    }

    public function About()
    {
        // return 'Index Page';
        return view("pages.about");
    }

    public function Services()
    {
        // return 'Index Page';
        return view("pages.services");
    }
}
