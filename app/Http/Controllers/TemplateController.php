<?php

namespace App\Http\Controllers;

use App\Template;
use Illuminate\Http\Request;

use App\Http\Requests;

class TemplateController extends Controller
{
    //
    public function index(){
        return view('template/template')->withTemplates(Template::all());
    }
}
