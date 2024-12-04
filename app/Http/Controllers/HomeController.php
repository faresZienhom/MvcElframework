<?php

namespace App\Http\Controllers;

use Iliuminates\Views\View;



class HomeController extends Controller
{
    
// Controller function for the home page
function index() {
    $validation = $this->validate([
        'user_id'=>$_GET['user_id']??'',
   ], [
        'user_id'=>['required','integer'],
   ], [
        'user_id'=>trans('main.user_id'),
   ]);
   echo "<pre>";
   return var_dump($validation->validated());

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
