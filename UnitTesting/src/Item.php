<?php
namespace App;

class Item{
    public String $title = '';

    public function getSlug()
    {
        return $this->title;
    }
}