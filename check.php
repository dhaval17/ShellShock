<?php
error_reporting(0);

$url = $_GET['url'];

if(!$url) 
{
    echo "Please enter URL";
	exit();
}
if(!preg_match("/\b(?:(?:https?):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url))
{
echo "Please use correct URL starting with http or https";
exit();
}
if(preg_match("/\b((?:https?):\/\/)(127.0.0.1|10.\d{1,3}.\d{1,3}.\d{1,3}|192.168.\d{1,3}.\d{1,3}|localhost)/i", $url))
{
echo "Private URLs are not allowed";
exit();
}

//remove the lines below if you want your scanner to allow scanning gov sites

$header = stream_context_create(
    array(
	'http' => array(
            'method'  => 'GET',
            'header'  => 'None'
        )
    )
);
$final = 'check2.php?url=' . $url;
$req = file_get_contents($final, false, $header);
echo $req;

?>