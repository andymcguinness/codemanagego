<?php
/* This is the List class */

class TaskList {
    
    /* Protected properties */
    protected $lst_id;
    protected $lst_title;
    protected $lst_tags;
    
    /* Constructor */
    
    public function __construct($title){
        $this->setTitle($title);
    }
    
    
    /* Entity relationship */
    
    // Between List and Task
    protected $tasks;
    
    public function setTasks(array $tasks) {
        $this->tasks = $tasks;
    }
    
    public function defineTasks(Task $task) {
        $this->tasks[] = $task;
    }
    
    // Between List and User
    protected $members;
    
    public function setMembers(array $members) {
        $this->members = $members;
    }
    
    public function listMembers(User $user) {
        $this->members[] = $user;
    }
    
    /* Interface methods */
    
    // Function to return any property (DRY)
    public function __get($item) { // Keeping this in case I add any properties
        return $this->$item;
    }
    
    public function setID($id) {
        $this->lst_id = $id;
    }
    
    public function setTitle($title) {
        $this->lst_title = $title;
    }
    
    public function setTags($tags) { // Can have multiple tags, so treating it like an array
        foreach ($tags as $tag) {
            $this->tags[] = $tag;
        }
    }
}
?>