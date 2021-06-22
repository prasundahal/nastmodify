
var XMLHttpRequestObject = false;
if (window.XMLHttpRequest){
	XMLHttpRequestObject = new XMLHttpRequest();
}else if(window.ActiveXObject){
	XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
}

function show_loading(i)
{
	document.getElementById("loading"+i).style.display = 'block';
}

function hide_loading(i)
{
	document.getElementById("loading"+i).style.display = 'none';
}

function hideDiv(strdiv)
{
	document.getElementById(strdiv).style.display = 'none';
}

function sleep(numberMillis) {
    var now = new Date();
    var exitTime = now.getTime() + numberMillis;
    while (true) {
        now = new Date();
        if (now.getTime() > exitTime)
            return;
    }
}
//polling

function VoteNow(url, divResponse, f, poll_id){
	//alert(f.polling.selected.value);
	var option_value = '';
	var sizes=document.forms.polling;
	for (i=0; i<sizes.length; i++) {
		if (sizes[i].checked==true) {
			option_value = sizes[i].value;
			//alert(option_value + ' you got a value');	
		}
	}
	
	if (XMLHttpRequestObject){ 
		show_loading('0');
		var obj = document.getElementById(divResponse);	
		var variables = "option_value="+option_value+"&poll_id="+poll_id;
		XMLHttpRequestObject.open("POST", url, true);
		XMLHttpRequestObject.setRequestHeader("Content-type","application/x-www-form-urlencoded")
		XMLHttpRequestObject.onreadystatechange = function()
		{
			if (XMLHttpRequestObject.readyState == 1){
			}
			else if (XMLHttpRequestObject.readyState  == 4 && XMLHttpRequestObject.status == 200){ 
				obj.innerHTML = XMLHttpRequestObject.responseText;
				hide_loading('0');
			}
		}
		XMLHttpRequestObject.send(variables);
	}
}


