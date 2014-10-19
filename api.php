<?php
  // this script require curl extension
  //phpinfo();

  /* Parameters */
  // https://api.mongolab.com/api/1/databases/veronagest/collections?apiKey=21N_QFmX9N0PkCSd9KklDd1ctU0bpMs4&view=json
$destination = 'https://api.mongolab.com/api/1/databases';
/* ---- */


//the query should be filtered or altered?
$query = $_SERVER["QUERY_STRING"];
$path = $_SERVER["PATH_INFO"];

//do the request, fetching the content-type too
$ch = curl_init($destination . $path . '?' . $query);
//return output instead of printing it
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$content = curl_exec($ch);
$contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
curl_close($ch);

//forward content type
header('Content-Type: ' . $contentType);
//forward content
print $content;
