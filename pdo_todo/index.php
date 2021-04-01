<?php
require 'vendor/autoload.php';
use \App\Models\Todo;

$todo = new Todo("new todo");
echo "title is" . $todo->title;