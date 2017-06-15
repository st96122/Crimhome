<?php
function do_post_request($url, $data, $optional_headers = null)
  {
     $params = array('http' => array(
                  'method' => 'POST',
                  'content' => $data
               ));
     if ($optional_headers !== null) {
        $params['http']['header'] = $optional_headers;
     }
     $ctx = stream_context_create($params);
     $fp = @fopen($url, 'rb', false, $ctx);
     if (!$fp) {
        throw new Exception("Problem with $url, $php_errormsg");
     }
     $response = @stream_get_contents($fp);
     if ($response === false) {
        throw new Exception("Problem reading data from $url, $php_errormsg");
     }
     return $response;
  }
  
  ?>
  <!DOCTYPE html>
  <html>
  <head>
  <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  <?php
  $result = do_post_request("http://ilearning.kuas.edu.tw/login.php","username=1105108131&password=9433&login key=f53b2f894c8a8595af9cd4d2f0fa6ea5","");
  echo "$result";
  echo "321";
?>
  </body>
  </html>
  