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
 public function staff()
{
    return view('staff.login'); // create.blade.php
}
 public function parishioner()
{
    return view('authentication.userform'); // create.blade.php
}
}






