<?php
/**
 * Created by JetBrains PhpStorm.
 * User: npanta2
 * Date: 10/17/12
 * Time: 12:39 AM
 * To change this template use File | Settings | File Templates.
 */


//class object holds directory info
class DirElement
{
    private $dirData;
    private $dirSubDirectories;
    private $dirFileData;

    public function __construct($dirName, $dirRevision, $dirAuthor, $dirDate) {

        $this->dirData = array("name" => $dirName, "revision" => $dirRevision, "author" => $dirAuthor, "date" => $dirDate); //add "message" after parsing log file
        $this->dirSubDirectories = array();
        $this->dirFileData = array();
    }

    public function getdirData() {
        return $this->dirData;
    }

    public function getdirSubDirectories() {
        return $this->dirSubDirectories;
    }

    public function getdirFileData() {
        $return = array();
        foreach($this->dirSubDirectories as $child) {
            $files = $child->helpGetFileData();
            foreach($files as $file) {
                $return[$file->getName()] = $file;
            }
        }
        return $return;
    }

    public function helpGetFileData() {
        return $this->dirFileData;
        }

    public function getName() {
        $name = $this->dirData["name"];
        return $name;
    }

    public function getDate() {
        $date = $this->dirData["date"];
        return $date;
    }

    public function getAuthor() {
        $author = $this->dirData["author"];
        return $author;
    }

    public function getRevision() {
        $revision = $this->dirData["revision"];
        return $revision;
    }

    public function addMessage($msg) {
        $this->dirData["message"] = $msg;
    }
    
    public function getMessage() {
    	$msg = $this->dirData["message"];
    	return $msg;
    }

    public function addSubDir($name, $dirObj) {
        $this->dirSubDirectories[$name] = $dirObj;
    }

    public function addFile($currDir, $name, $fileObj) {
        $myDir = $this->dirSubDirectories;
        $myDir[$currDir]->dirFileData[$name] = $fileObj;
    }
}
