<?php
class Todo {
    private $id;
    private $title;
    private $description;
    public $status;
    private $completed_at;

    public static $last_id = 0;

    public function __construct(int $id, string $title, string $description = '') {
        $this->id = $id;
        $this->title = $title;
        $this->$description = $description;
        $this->status = false;
        Todo::$last_id++;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescrption() {
        return $this->description;
    }

    public function getId() {
        return $this->id;
    }

    public function markDone() {
        $this->status = true;
    }
}

$todo1 = new Todo(Todo::$last_id + 1, 'test', 'test description');
$todo2 = new Todo(Todo::$last_id + 1, 'test', 'test description');
$todo3 = new Todo(Todo::$last_id + 1, 'test', 'test description');

echo "todo1 is ";
var_dump($todo1);
echo "<br>todo2 is ";
var_dump($todo2);
echo "<br>todo3 is ";
var_dump($todo3);
$todo1->markDone();
echo "<br/><br/> After status change ";
var_dump($todo1);


