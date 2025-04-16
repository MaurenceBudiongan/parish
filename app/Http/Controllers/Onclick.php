<?php
namespace App\Http\Controllers;
class Onclick extends Controller
{
 public function adminform()
 {
     return view('authentication.adminform'); 
 }
 public function create()
{
    return view('user/document_requests.create'); // create.blade.php
}
}






