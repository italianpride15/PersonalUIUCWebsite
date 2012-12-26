<?php


//error_reporting(E_ERROR | E_PARSE);

/**
 * Created by JetBrains PhpStorm.
 * User: npanta2
 * Date: 10/17/12
 * Time: 10:22 PM
 * To change this template use File | Settings | File Templates.
 */
include 'DirElement.php';
include 'FileElement.php';
include 'VersionElement.php';
include 'XMLArray.php';
include 'XMLArrayNoFlat.php';

//parser function
function parse() {
    $xml_list = simplexml_load_file("svn_list.xml");
    $xml_log = simplexml_load_file("svn_log.xml");

    //special functions that load the xml files into array format
    $list = simpleXMLToArray($xml_list);
    $log = toArray($xml_log);

    $assignmentList = array();
    $currAssignment = null;
    $currDir = null;
    $itr = 0;

    //parse the list file by flattening
    foreach($list["list"]["entry"] as $child) {

        //check if dir and get info
        if($list["list"]["entry"][$itr]["kind"] == "dir") {
            $name = $list["list"]["entry"][$itr]["name"];
            $author = $list["list"]["entry"][$itr]["commit"]["author"];
            $date = $list["list"]["entry"][$itr]["commit"]["date"];
            $revision = $list["list"]["entry"][$itr]["commit"]["revision"];

            $dirObj = new DirElement($name, $revision, $author, $date);

            //checking if new dir or sub dir
            if($currAssignment == null || strpos($name, $currAssignment) === false) { //is new dir
                $currAssignment = $name;
                $currDir = $name;
                $assignmentList[$dirObj->getName()] = $dirObj;
            }
            else{ //is sub dir
                $currDir = $name;
                $assignmentList[$currAssignment]->addSubDir($name, $dirObj);
            }
        }

        //check if file and get info
        if($list["list"]["entry"][$itr]["kind"] == "file") {
            $name = $list["list"]["entry"][$itr]["name"];
            $size = $list["list"]["entry"][$itr]["size"];
            $revision = $list["list"]["entry"][$itr]["commit"]["revision"];
            $author = $list["list"]["entry"][$itr]["commit"]["author"];
            $date = $list["list"]["entry"][$itr]["commit"]["date"];

            $fileObj = new FileElement($name, $size, $revision, $author, $date);

            $inc = 0;
            foreach($log["logentry"] as $child1) {
                $entryRevision =  $log["logentry"][$inc]["@attributes"]["revision"];
                $entryAuthor = $log["logentry"][$inc]["author"];
                $entryDate =  $log["logentry"][$inc]["date"];
                $entryMsg = $log["logentry"][$inc]["msg"];

                $entrySize = sizeof($log["logentry"][$inc]["paths"]["path"]) - 1;
                while($entrySize >= 0) {
                    $path = $log["logentry"][$inc]["paths"]["path"][$entrySize];
                    if(strstr($path, $name) !== false) {
                        if($entryRevision == $revision) {
                            $assignmentList[$currAssignment]->addMessage($entryMsg);
                            $fileObj->addPath($path);
                        }
                        else {
                            $versionData = new VersionElement($entryRevision, $entryAuthor, $entryMsg, $entryDate);
                            $fileObj->addVersion($entryRevision, $versionData);
                        }
                    }
                    $entrySize -= 1;
                }
                $inc += 1;
            }
            //assign file to directory
            $assignmentList[$currAssignment]->addFile($currDir, $name, $fileObj);
        }
        $itr += 1;
    }
    //var_dump($assignmentList);


  return $assignmentList;
}












