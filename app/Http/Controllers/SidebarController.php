<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class SidebarController extends Controller
{
    public function showUser()
    {
        return view('admin.dashboard.sidebar.user'); // Adjust the path as necessary
    }

    public function showDocumentRequest()
    {
        return view('admin.document_requests'); // Adjust the path as necessary
    }
}