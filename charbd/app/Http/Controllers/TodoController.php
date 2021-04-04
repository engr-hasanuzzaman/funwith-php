<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Services\TodoService;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    protected $todoService;

    public function __construct(TodoService $todoService) {
        $this->todoService = $todoService;
    }
    public function store(Request $request)
    {
        $todo = Todo::create($request->only('title', 'description'));

        return $todo;
    }
}
