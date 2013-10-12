<?php
/* This is the List class */

class Task {
    
    /* Protected properties */
    protected $id;
    protected $title;
    protected $dueDate;
    protected $createdDate;
    protected $isComplete;
    protected $tags;
    
    /* Entity relationship */
    
    // Between Task and User
    protected $assignees;
    
    public function setAssignees(array $assignees) {
        $this->assignees = $assignees;
    }
    
    public function assignTasks(User $user) {
        $this->assignees[] = $user;
    }
    
    /* Constructor */
    
    public function __construct($title){
        $this->createdDate = date("Y/m/d H:i:s"); // Setting the created date to the system's date
        $this->setTitle($title);
    }
    
    /* Interface methods */
    
    // Function to return any property (DRY)
    public function __get($item) { // Keeping this in case I add any properties
        return $this->$item;
    }
    
    public function setTitle($title) {
        $this->title = $title;
    }
    
    public function setDueDate($dueDate) {
        $this->dueDate = $dueDate;
    }
    
    public function setIsComplete($isComplete) {
        if (gettype($isComplete) == 'boolean') {
            $this->isComplete = $isComplete;            
        } else {
            user_error('Incorrect data type for variable isComplete. Please enter a bool and try again.');
        }
    }
    
    public function setTags($tags) { // Can have multiple tags, so treating it like an array
        foreach ($tags as $tag) {
            $this->tags[] = $tag;
        }
    }
}
?>