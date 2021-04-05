<?php
namespace App\Repositories;

use App\Models\User;

class UsersRepository {
    protected $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function foo()
    {
        return "this is foo";
    }

    public function all()
    {
        return $this->user->all();
    }
}