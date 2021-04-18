<?php

namespace App;

class Todo
{
    private int $id;
    protected String $title;

    public function __construct(int $id = 0, string $title = '') {
        $this->id = $id;
        $this->title = $title;
    }

    private function getId()
    {
      return $this->id;
    }

    protected function getTitle()
    {
        return $this->title;
    }

    private function titleWithPrefix(string $prefix)
    {
        return $prefix . $this->title;
    }
}