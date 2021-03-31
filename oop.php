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

echo "Id of the todo1 is " . $todo1->getId();
echo "<br> Id of the todo2 is " . $todo2->getId();
echo "<br> Id of the todo1 is " . $todo3->getId();
echo "<br/> Before status change " . $todo1->status;
$this->markDone();
echo "<br/> After status change " . $todo1->status;

