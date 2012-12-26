<?php
/**
 * Created by JetBrains PhpStorm.
 * User: npanta2
 * Date: 10/17/12
 * Time: 12:39 AM
 * To change this template use File | Settings | File Templates.
 */

//class object holds file info
class FileElement
{
    private $fileData;
    private $prevVersions;

    public function __construct($fileName, $fileSize, $fileRevision, $fileAuthor, $fileDate) {

        $this->fileData = array("name" => $fileName, "size" => $fileSize, "revision" => $fileRevision, "author" => $fileAuthor, "date" => $fileDate); //add "path" after parsing log file
        $this->prevVersions = array();
    }

    public function getFileData() {
        return $this->fileData;
    }

    public function getName() {
        $name = $this->fileData["name"];
        return $name;
    }
    
    public function getSize() {
    	$size = $this->fileData["size"];
    	return $size;
    }
    
    public function getRevision() {
    	$revision = $this->fileData["revision"];
    	return $revision;
    }
    
    public function getAuthor() {
    	$author = $this->fileData["author"];
    	return $author;    
    }
    
    public function getDate() {
    	$date = $this->fileData["date"];
    	return $date;
    }
    
    public function getPath() {
    	$path = $this->fileData["path"];
    	return $path;
    }
    
    public function getPrevVersions() {
    	return $this->prevVersions;   
    }

    public function addPath($path) {
        $this->fileData["path"] = $path;
    }
    public function addVersion($name, $commitObj) {
        $this->prevVersions[$name] = $commitObj;
    }
}
