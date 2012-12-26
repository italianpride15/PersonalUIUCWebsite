<?php

$my_url = $_POST['file'];
$returnData = get_data("https://subversion.ews.illinois.edu/svn/fa12-cs242/npanta2/" . $my_url);
echo "<pre class=\"brush: js\">" . $returnData . "</pre>";

/* gets the data from a URL */
function get_data($url) {
  $user = $_POST['svn_user'];
  $password = $_POST['password'];
  $ch = curl_init();
  $timeout = 5;
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  curl_setopt($ch,CURLOPT_USERPWD, $user . ":" . $password);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}

?>