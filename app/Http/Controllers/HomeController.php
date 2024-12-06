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
   //    return var_dump($validation->validated());
   
}
public function data(){
    return view('data'); 
}

public function data_post(){
    echo "<pre>";
    return var_dump(request());
     
    // $file = request()->file(name: 'file');
    // $file->name(time());
    // return $file->store('my/images');

    //return Request::file('file')->store('data');
    //return Request::file('file');
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
