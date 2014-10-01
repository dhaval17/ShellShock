<!DOCTYPE html>
<html lang="en-US">
<head>

<!-- Meta Tags -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>ShellShock Test</title>   

<meta name="description" content="Unknown Error" /> 
<link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="/favicon.ico">

<link href="/css/bootstrap.min.css" rel="stylesheet">
<link href="/css/customx.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/purify.js"></script>
<script>

//Accept from location.hash
function hashinput()
{
if(location.hash)
{
var url = location.hash;
url = DOMPurify.sanitize(url);
var parts = url.replace( /(#)/ig, '' );
document.getElementById('url').value = parts;
check();
}
}

function check()
{
	var count = 1;
	var url = document.getElementById('url').value;

	//Check for NULL
	if(!url) 
	{ 
		document.getElementById("data").innerHTML="Input Field cannot be NULL";
		$('.bs-example-modal-sm').modal('show');
		count = 0;
	}
	//Check for proper URL
	if(!url.match(/^http([s]?):\/\/.*/) && count)
	{
		document.getElementById("data").innerHTML="Please use correct URL starting with http or https"
		$('.bs-example-modal-sm').modal('show');
		count = 0;
	}
	//Sending AJAX request
	if(count)
	{
		document.getElementById('loading').style.display = "block";

		if (window.XMLHttpRequest)
		{
			xmlhttp=new XMLHttpRequest();
		}
	else
	{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("data").innerHTML=xmlhttp.responseText;
			$('.bs-example-modal-sm').modal('show');
			document.getElementById('loading').style.display = "none";
	
		}
	}
	xmlhttp.open("GET","check.php?url="+url,true);
	xmlhttp.send();
}
}
</script>

</head>


<body>
<div class="container">
<div class="middle">
<div class="row">
		<h1 class="title">ShellShock Test</h1>
		
		<h2><a href="http://web.nvd.nist.gov/view/vuln/detail?vulnId=CVE-2014-6271">CVE-2014-6271</a></h2>
		
		<h4>A severe vulnerability was disclosed in bash that affects is present on most Linux, BSD, and Unix-like systems, including Mac OS X. Per the vulnerability identified as CVE-2014-6271 (nicknamed <b>Shellshock</b>), bash does not stop processing after the function definition, leaving it vulnerable to malicious functions containing trailing commands <a href="https://community.rapid7.com/community/infosec/blog/2014/09/25/bash-ing-into-your-network-investigating-cve-2014-6271">More Info</a></h4>
		
		<input type="text" name="url" placeholder="URL" id="url" class="form-control"/>
		<br />
		<button name="check" onclick="check()" class="btn btn-primary btn-lg" >Check</button>
		<br /><h4>Example : http://example.com/cgi-bin/check.cgi </h4><br />
		<div id="loading" style="display: none;"><img src="/img/spinner.gif" /></div>

</div>
<div class="row">
                <h2 class="title"><u>Get in Touch</u></h2>
                <h3 class="title-description">Mail me  : <a href="mailto:dhaval@dr4cun0.com">dhaval@dr4cun0.com</a></h3>
</div>
</div>
</div>

<div aria-hidden="true" aria-labelledby="mySmallModalLabel" role="dialog" tabindex="-1" class="modal fade bs-example-modal-sm in" style="display: none;">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">

        <div class="modal-header">
          <button data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
          
          
          <b id="mySmallModalLabel" class="modal-title">Info</b>
        </div>
        <div class="modal-body" id="data">
          
        </div>
      </div>
    </div>
  </div>
</body>
</html>
