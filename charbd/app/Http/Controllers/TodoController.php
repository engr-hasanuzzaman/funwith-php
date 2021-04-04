<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Repositories\Foo;
use App\Services\TodoServices;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class TodoController extends Controller
{

    /**
     * The user repository instance.
     */
    protected $users;
    protected $service;

    /**
     * Create a new controller instance.
     *
     * @param  UserRepository  $users
     * @param  TodoService  $service
     * @return void
     */
    public function __construct(TodoServices $service, UserRepository $users, )
    {
        $this->service = $service;
        $this->users = $users;
    }

    public function store(Request $request)
    {
        $todo = Todo::create($request->only('title', 'description'));

        return $todo;
    }
}
