<?php
namespace App;

class Item{
    public String $title = '';

    public function getSlug()
    {
        return str_replace(' ', '_', $this->title);
    }
}