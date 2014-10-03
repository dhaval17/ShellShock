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