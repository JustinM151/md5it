<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMessage;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function store(SendMessage $request)
    {
        $input = $request->input();
        $msg = new Message($input);
        $msg->save();
        return redirect('/thanks');
    }

    public function thanks()
    {
        return view('thanks');
    }
}
