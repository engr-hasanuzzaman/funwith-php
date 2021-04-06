<?php

// collection will be auto laoded if we run larave
$input = [1, 2, 3, 4, 5, null, null, 8, null, 10];
collect($input)->filter(function ($elm) { return !empty($elm) && $elm % 2 === 0;}); 
// [1] => 2
// [3] => 4
// [7] => 8
// [9] => 10

print_r($fA);