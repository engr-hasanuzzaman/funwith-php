<?php
class Todo {
    private $id;
    private $title;
    private $description;
    private $status;
    private $completed_at;

    public static $last_id = 0;

    public function __construct(int $id, string $title, string $description = '') {
        $this->id = $id;
        $this->title = $title;
        $this->$description = $description;
        $this->status = false;
        Todo::$last_id++;
    }

    public function getTitle()
    {
        return $this->title;
    }
}

$todo = new Todo(Todo::$last_id + 1, 'test', 'test description');
echo $todo->getTitle();

?>