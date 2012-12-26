<?php
/**
 * Created by JetBrains PhpStorm.
 * User: npanta2
 * Date: 10/17/12
 * Time: 3:56 AM
 * To change this template use File | Settings | File Templates.
 */

//class object holds commit info
class VersionElement
{
    private $versionData;

    public function __construct($commitRevision, $commitAuthor, $commitMessage, $commitDate) {

        $this->versionData = array("revision" => $commitRevision, "author" => $commitAuthor, "message" => $commitMessage, "date" => $commitDate);
    }

    public function getAuthor() {
        $author = $this->versionData["author"];
        return $author;
    }

    public function getDate() {
        $date = $this->versionData["date"];
        return $date;
    }

    public function getRevision() {
        $revision = $this->versionData["revision"];
        return $revision;
    }

    public function getMsg() {
        $msg = $this->versionData["message"];
        return $msg;
    }
}
