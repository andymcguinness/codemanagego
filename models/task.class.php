<?php
/* This is the Task class */

class Task {
    
    /* Protected properties */
    protected $tsk_id;
    protected $tsk_name;
    protected $tsk_due_date;
    protected $tsk_created_date;
    protected $usr_id;
    protected $tsk_content;
    protected $lst_id;
    protected $tsk_is_complete;
    protected $tsk_tags;
    
    /* Constructor */
    
    public function __construct($tsk_name = null){        
        if ($tsk_name != null){
            $this->setTitle($tsk_name);
        }
    }
    
    /* Entity relationship */
    
    // Between Task and User
    protected $assignees;
    
    public function setAssignees(array $assignees) {
        $this->assignees = $assignees;
    }
    
    public function assignTasks(User $user) {
        $this->assignees[] = $user;
    }
    
    /* Interface methods */
    
    // Function to return any property (DRY)
    public function __get($item) { // Keeping this in case I add any properties
        return $this->$item;
    }
    
    public function setTitle($title) {
        $this->tsk_name = $title;
    }
    
    public function setDueDate($dueDate) {
        $this->tsk_due_date = $dueDate;
    }
    
    public function setCreatedDate($createdDate) {
        $this->tsk_created_date = $createdDate;
    }
    
    public function setUserID($userID) {
        $this->usr_id = $userID;
    }
    
    public function setContent($content) {
        $this->tsk_content = $content;
    }
    
    public function setIsComplete($isComplete) {
        $this->tsk_is_complete = $isComplete;
    }
    
    public function setListID($listID) {
        $this->lst_id = $listID;
    }
    
    public function setTags($tags) {
        $this->tsk_tags = $tags;
    }
}
?>