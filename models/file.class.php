<?php
/* This is the File class */

class File {
    
    /* Protected properties */
    protected $fil_id;
    protected $fil_title;
    protected $fil_type;
    protected $fil_size;
    protected $fil_upload_time;
    protected $usr_id;
    protected $fil_tags;
    
    /* Entity relationship */
    
    // Between File and User
    protected $uploader;
    
    public function setUploader($uploader) {
        $this->uploader = $uploader; // There can only be one... user uploading a file
    }
    
    public function filesUploaded(User $user) {
        $this->uploader = $user;
    }
    
    /* Constructor */
    
    public function __construct(){ // Identifying a file with no required title
        //$this->type = $_FILES["file"]["type"]; // "file" is the name attribute of the html file-type input tag in our imaginary (future) upload form
        //$this->size = $_FILES["file"]["size"];
        //$this->uploadTime = date("Y/m/d H:i:s"); // Setting the upload time to the system's time
    }
    
    /* Interface methods */
    
    // Function to return any property (DRY)
    public function __get($item) {
        return $this->$item;
    }
    
    public function setID($id) {
        $this->fil_id = $id;
    }
        
    public function setTitle($title) {
        $this->fil_title = $title;
    }
    
    public function settype($type) {
        $this->fil_type = $type;
    }
    
    public function setSize($size) {
        $this->fil_size = $size;
    }
    
    public function setUploadTime($uploadTime) {
        $this->fil_upload_time = $uploadTime;
    }
    
    public function setUserID($userID) {
        $this->usr_id = $userID;
    }
    
    public function setTags($tags) {
        $this->fil_tags = $tags;
    }
}
?>