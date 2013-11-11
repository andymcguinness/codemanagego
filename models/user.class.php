<?php
/* This is the User class */

class User {
    
    /* Protected properties */
    protected $usr_id;
    protected $usr_username;
    protected $usr_lastname;
    protected $usr_firstname;
    protected $usr_email;
    protected $usr_password;
    protected $usr_isManager;
    
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
    
    public function __construct($userName= NULL, $password = NULL, $lastName = NULL, $firstName = NULL, $email = NULL){ // You need all information to sign up
        
        if ($userName != NULL) {
            $this->setFirstName($firstName);
        }
        
        if ($lastName != NULL) {
            $this->setLastName($lastName);
        }
        
        if ($firstName != NULL) {
            $this->usr_username = $userName;
        }
        
        if ($email != NULL) {
            $this->usr_email = $email;
        }
        
        if ($password != NULL) {
            $this->usr_password = $password;
        }
        
        if ($this->usr_isManager === NULL) {
            $this->usr_isManager = 'n';
        }
    }
    
    /* Interface methods */
    
    // Function to return any property (DRY)
    public function __get($item) {
        return $this->$item;
    }
    
    public function setUserName($userName) {
        $this->usr_username = $userName;
    }
    
    public function setFirstName($firstName) {
        $this->usr_firstname = $firstName;
    }
    
    public function setLastName($lastName) {
        $this->usr_lastname = $lastName;
    }
    
    public function setEmail($email) {
        $this->usr_email = $email;
    }
    
    public function setIsManager($isManager) {
        $this->usr_isManager = $isManager;
    }
}
?>