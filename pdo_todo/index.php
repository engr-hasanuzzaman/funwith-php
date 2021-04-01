<?php
require 'vendor/autoload.php';

$todo = new Todo("new todo");
echo "title is" . $todo->title;