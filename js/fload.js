var xmlhttpf;
function loadXMLFile(url,cfunc)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttpf=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttpf=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttpf.onreadystatechange=cfunc;
xmlhttpf.open("POST",url,true);
xmlhttpf.send();
}
function loadafile(userd,lang,filename)
{
 fpath="code_dep/"+userd+"/"+lang+"/"+filename+"."+lang;
 loadXMLFile(fpath,function()
  {
  if (xmlhttpf.readyState==4 && xmlhttpf.status==200)
    {
  	  //document.getElementById("thecode").innerHTML=xmlhttpf.responseText;
          editor.setValue(xmlhttpf.responseText);
	  document.getElementById("fname").value=filename;
	  document.getElementById("opcode").readOnly=true;
   	  document.getElementById("operrs").readOnly=true;
	 document.getElementById('run_code').style.visibility = 'visible'; 					
	document.getElementById('sub_code').style.visibility = 'hidden';
    } 
  });
}
