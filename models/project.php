<?php
/* This is the Project class */

class Project {
    
    /* Protected properties */
    protected $id;
    protected $title;
    protected $dueDate;
    protected $createdDate;
    protected $isComplete;
    protected $tags;
    
    /* Entity relationship */
    
    // Between Project and User
    protected $assignment;
    
    public function setAssignment(array $assignment) {
        $this->assignment = $assignment;
    }
    
    public function assignProject(User $user) {
        $this->assignment[] = $user;
    }
    
    /* Constructor */
    
    public function __construct($title){
        $this->createdDate = date("Y/m/d H:i:s"); // Setting the created date to the system's time
        $this->title = $title;
        $this->isComplete = false; // Assuming a project isn't complete upon creation
    }
    
    /* Interface methods */
    
    // Function to return any property (DRY)
    public function __get($item) {
        return $this->$item;
    }
    
    // Does what it says on the box
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
    
    public function setTags($tags) {
        foreach ($tags as $tag) {
            $this->tags[] = $tag;
        }
    }
}

?>