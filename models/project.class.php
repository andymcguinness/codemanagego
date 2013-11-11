<?php
/* This is the Project class */

class Project {
    
    /* Protected properties */
    protected $pjt_id;
    protected $pjt_title;
    protected $pjt_due_date;
    protected $pjt_created_date;
    protected $pjt_is_complete;
    protected $usr_id;
    protected $pjt_tags;
    
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
        //$this->createdDate = date("Y/m/d H:i:s"); // Setting the created date to the system's time
        $this->setTitle($title);
        //$this->isComplete = false; // Assuming a project isn't complete upon creation
    }
    
    /* Interface methods */
    
    // Function to return any property (DRY)
    public function __get($item) {
        return $this->$item;
    }
    
    public function setID($id) {
        $this->pjt_id = $id;
    }
    
    public function setTitle($title) {
        $this->pjt_title = $title;
    }
    
    public function setDueDate($dueDate) {
        $this->pjt_due_date = $dueDate;
    }
    
    public function setCreatedDate($createdDate) {
        $this->pjt_created_date = $createdDate;
    }
    
    public function setIsComplete($isComplete) {
        $this->pjt_is_complete = $isComplete;
    }
    
    public function setUserID($userID) {
        $this->usr_id = $userID;
    }
    
    public function setTags($tags) {
        $this->pjt_tags = $tags;
    }
}

?>