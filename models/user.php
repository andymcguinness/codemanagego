<?php
/* This is the User class */

class User {
    
    /* Protected properties */
    protected $id;
    protected $userName;
    protected $lastName;
    protected $firstName;
    protected $email;
    protected $isManager;
    
    /* Entity relationship */
    
    // Between User and Project
    protected $assignments;
    
    public function setAssignment(array $assignments) {
        $this->assignments = $assignments;
    }
    
    public function projectsAssigned(Project $project) {
        $this->assignments[] = $project;
    }
    
    // Between User and File
    protected $uploads;
    
    public function setUploads(array $uploads) {
        $this->uploads = $uploads;
    }
    
    public function filesUploaded(File $file) {
        $this->uploads[] = $file;
    }
    
    /* Constructor */
    
    public function __construct($userName, $lastName, $firstName, $email){ // You need all information to sign up
        
        // Testing to make sure first & last names are strings
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        
        $this->userName = $userName;
        $this->email = $email;
    }
    
    /* Interface methods */
    
    // Function to return any property (DRY)
    public function __get($item) {
        return $this->$item;
    }
    
    // Does what it says on the box
    public function setUserName($userName) {
        $this->userName = $userName;
    }
    
    public function setFirstName($firstName) {
        if (gettype($firstName) == 'string') {
            $this->firstName = $firstName;            
        } else {
            user_error("You did not enter a valid first name. Try again.");
        }
    }
    
    public function setLastName($lastName) {
        if (gettype($lastName) == 'string') {
            $this->lastName = $lastName;            
        } else {
            user_error("You did not enter a valid last name. Try again.");
        }
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function setIsManager($isManager) {
        if (gettype($isManager) == 'boolean') {
            $this->isManager = $isManager;            
        } else {
            user_error('Incorrect data type for variable isManager. Please enter a bool and try again.');
        }
    }
}
?>