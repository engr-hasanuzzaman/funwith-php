<?php
namespace App;

class Item{
    public String $title = '';

    public function getSlug()
    {
        return preg_replace('/\s+/', '_', $this->title);
    }
}