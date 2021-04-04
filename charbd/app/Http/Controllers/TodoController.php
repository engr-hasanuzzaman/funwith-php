<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function store(Request $request)
    {
        $todo = Todo::create($request->only('title', 'description'));

        return $todo;
    }
}
