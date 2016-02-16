function conf_del(dtfile,etn)
{
	 var r=confirm("Are you sure you want to delete "+dtfile+"."+etn);
	 if (r==true)
	 {
	  window.location = "del_code.php?dfile="+dtfile;
	 }	 
	 else
	 {
	  location.reload();
	 }
}	
function changeLang(nlan)
{
	window.location = "load_dir.php?alang="+nlan;
}
function show_compe()
{
	document.getElementById('run_code').style.visibility = 'visible'; 					
	document.getElementById('sub_code').style.visibility = 'hidden';
}
function show_both()
{
	document.getElementById('run_code').style.visibility = 'visible'; 					
	document.getElementById('sub_code').style.visibility = 'visible';
}
