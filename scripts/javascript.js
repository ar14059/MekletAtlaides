var xmlHttp = createXmlHttpRequestObject();

function createXmlHttpRequestObject(){
	var xmlHttp;

	if(window.ActiveXObject){
		try{
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		}catch(e){
			xmlHttp = false;
		}
	}else{
		try{
			xmlHttp = new XMLHttpRequest();
		}catch(e){
			xmlHttp = false;
		}
	}

	if (!xmlHttp) {
		alert("Can't create object.");
	}else{
		return xmlHttp;
	}
}


function process(){
	if(xmlHttp.readyState==0 || xmlHttp.readyState==4){
		reg_nr = encodeURIComponent(document.getElementById("reg_nr").value);
		uzn_parole = encodeURIComponent(document.getElementById("uzn_parole").value);
		xmlHttp.open("POST", "ajax_input.php?reg_nr=" + reg_nr + "&uzn_parole="+uzn_parole, true);
		xmlHttp.onreadystatechange = handleServerResponse;
		xmlHttp.send(null);
	}else{
		setTimeout('process()', 1000);
	}
}


function handleServerResponse(){
	if(xmlHttp.readyState==4){
		if(xmlHttp.status==200){
			xmlResponse = xmlHttp.responseXML;
			xmlDocumentElement = xmlResponse.documentElement;
			message = xmlDocumentElement.firstChild.data;
			document.getElementById("underInput").innerHTML = 
			'<span style="color:blue">' + message + '</span>';
			// setTimeout('process()', 500);
		}else{
			alert('Something went wrong!');	
		}
	}
}


$('button#a-append-company').on('click', function(){
	var name = $('input#reg_nr').val();
	var surname = $('input#uzn_parole').val();
	if($.trim(name) != '' && $.trim(surname) != ''){
		$.post('ajax/append.php', {name: name, surname: surname}, function(data){
			$('div#name-data').text(data);
		})
	}
})



function myTrim(x) {
    return x.replace(/^\s+|\s+$/gm,'');
}

function FirstLetterCapital(string) {
return string.charAt(0).toUpperCase() + string.slice(1);
}


function goBack() {
    window.history.back();
}
	
