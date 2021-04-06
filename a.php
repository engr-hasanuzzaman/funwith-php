<?php
$commont = [
            'name' => 'required|max:250|unique:suppliers',
            'remarks' => 'required|max:250',
            'link' => 'required|max:250',
            'category' => 'required',
            'address' => 'nullable',
        ];
$extra = [
	'name' => 'foo',
    'link' => 'foo'
];

function foo($a) {
	return implode("|", array_values($a));
}
print_r(array_map('foo',array_merge_recursive($commont,$extra)));
?>
