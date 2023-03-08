<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use App\Models\BookTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $messages = Message::orderBy('created_at','desc')->paginate(3);
        $bookTables = BookTable::paginate(3);
        return view("admin.dashboard",[
            "bookTables"=>$bookTables,
            "messages"=>$messages
        ]);
    }
}
