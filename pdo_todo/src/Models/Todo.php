<?php
namespace App\Models;

class Todo {
    public $id;
    public $title;

    public function __construct(string $title) {
        $this->title = $title;
    }
}
