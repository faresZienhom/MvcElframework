<?php

namespace App\Http\Controllers;

use Iliuminates\Views\View;



class HomeController 
{
    
// Controller function for the home page
function index() {
    return View::make('index',['title'=>'index title','content'=>'test content']);

}

// Controller function for the about page
function about() {
    echo "Welcome to the About Page!";
}

// Controller function for the contact page
function api_any() {
    echo "Welcome to the Contact Page!";
}
public function article($id)
{
    echo 'Welcome To article page id = '.$id;
}


}
