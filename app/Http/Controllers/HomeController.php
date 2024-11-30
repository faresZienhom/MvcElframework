<?php

namespace App\Http\Controllers;



class HomeController 
{
    
// Controller function for the home page
function index() {
    echo "Welcome to the Home Page!";
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
