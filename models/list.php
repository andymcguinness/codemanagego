<?php
/* This is the List class */

class List {
    
    /* Protected properties */
    protected $id;
    protected $tag;
    
    /* Entity relationship */
    
    // Between List and Task
    protected $tasks;
    
    public function setTasks(array $tasks) {
        $this->tasks = $tasks;
    }
    
    public function assignProject(Task task) {
        $this->tasks[] = $task;
    }
    
    // Between List and User
    protected $members;
    
    public function setMembers(array $members) {
        $this-members = $members;
    }
    
    public function listMembers(User $user) {
        $this->members[] = $user;
    }
    
    /* Interface methods */
    
    // Function to return any property (DRY)
    public function __get($item) { // Keeping this in case I add any properties
        return $this->$item;
    }
    
    public function setTags($tags) { // Can have multiple tags, so treating it like an array
        foreach ($tags as $tag) {
            $this->tags[] = $tag;
        }
    }
}
?>