<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Repositories\Foo;
use App\Services\BarService;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Services\ToService;

class TodoController extends Controller
{

    /**
     * The user repository instance.
     */
    protected $users;
    protected $service;

    public function __construct(ToService $service, UserRepository $users, )
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
