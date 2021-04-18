<?php
namespace App;

class ChildTodo extends Todo
{
    public function getTitle() {
        parent::getTitle();
    }
}