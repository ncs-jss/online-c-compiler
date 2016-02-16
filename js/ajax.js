
var xmlhttpo;
function loadXMLDoc(url,cfunc)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttpo=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttpo=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttpo.onreadystatechange=cfunc;
xmlhttpo.open("POST",url,true);
xmlhttpo.send();
}
function loadcode(path,fname,wext)
{
 loadXMLDoc(path,function()
  {
  if (xmlhttpo.readyState==4 && xmlhttpo.status==200)
    {     
	var r=confirm("Any Unsaved Changes will be lost!!! Are you Sure??");
	 if (r==true)
  	 {
  	  document.getElementById("thecode").innerHTML=xmlhttpo.responseText;
          editor.setValue(xmlhttpo.responseText);
	  document.getElementById("fname").value=wext;		//wext : Filename without Extension
  	 }
    } 
  });
}


