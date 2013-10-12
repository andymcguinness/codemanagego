<?php
/* This is the File class */

class File {
    
    /* Protected properties */
    protected $id;
    protected $title;
    protected $type;
    protected $size;
    protected $uploadTime;
    protected $tags;
    
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
        $this->type = $_FILES["file"]["type"]; // "file" is the name attribute of the html file-type input tag in our imaginary (future) upload form
        $this->size = $_FILES["file"]["size"];
        $this->uploadTime = date("Y/m/d H:i:s"); // Setting the upload time to the system's time
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
    
    public function setTags($tags) { // Can have multiple tags, so treating it like an array
        foreach ($tags as $tag) {
            $this->tags[] = $tag;
        }
    }
}
?>