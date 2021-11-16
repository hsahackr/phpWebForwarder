<?php 

// phpWebForwarder by hsahackr v1.0 || https://github.com/hsahackr/phpWebForwarder || Licensed as stated in LICENSE file

$ip = "0.0.0.0";

# POST request

$post = [];

foreach ($_POST as $param_name => $param_val) {
  $post += [$param_name => $param_val];
}

# Headers request

$headers = [];
foreach(apache_request_headers() as $nam => $val){
  if((!str_starts_with($nam, "Accept") or $nam == "Accept-Language") and $nam != "Connection" and $nam != "Content-Length"){
    $headers[] = "$nam: $val";
  }
}

# CURL request

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://$ip" . $_SERVER["REQUEST_URI"]);

if(count($post) > 0){
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
}
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);

# Response split

$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$headers = substr($response, 0, $header_size);
$body = substr($response, $header_size);

# Header response

foreach(explode("\n", $headers = substr($response, 0, $header_size)) as $header){
  if($header > 2){
    header($header);
  }
}
header("Content-type: image/jpeg");
header("X-Powered-By: phpForwarder");

# Body response

print $body;

###############

curl_close ($ch);
