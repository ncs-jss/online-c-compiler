var xmlhttp;
var xmlhttpe;
function view_out(userd,user,lang)
{

var ofile="code_dep/"+userd+"/"+lang+"/out_"+user+".txt";
var odiv="opcode";
var efile="code_dep/"+userd+"/"+lang+"/e_"+user+".txt";
var ediv="operrs";
//loadcode(fpath,fnam);
showout(ofile,odiv);
showerrs(efile,ediv);
}
function loadXMLOps(url,rfunc)
{
 
 if (window.XMLHttpRequest)
   {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
   }
 else
   {// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
   }
 xmlhttp.onreadystatechange=rfunc;
 xmlhttp.open("POST",url,true);
 xmlhttp.send();
}
function loadXMLerrs(url,rfunc)
{
 
 if (window.XMLHttpRequest)
   {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttpe=new XMLHttpRequest();
   }
 else
   {// code for IE6, IE5
    xmlhttpe=new ActiveXObject("Microsoft.XMLHTTP");
   }
 xmlhttpe.onreadystatechange=rfunc;
 xmlhttpe.open("POST",url,true);
 xmlhttpe.send();
}
function showout(url2,div)
{
 loadXMLOps(url2,function()
  {
   if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	document.getElementById(div).innerHTML=xmlhttp.responseText;
	document.getElementById(div).readOnly=true;
    }
  });
}
function showerrs(url2,div)
{
 loadXMLerrs(url2,function()
  {
  if (xmlhttpe.readyState==4 && xmlhttpe.status==200)
    {
      document.getElementById(div).innerHTML=xmlhttpe.responseText;
      document.getElementById(div).readOnly=true;
    }
  });
}
