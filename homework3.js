// JavaScript Document
var imgq="<img src='http://www.precisionmarketinggroup.com/Portals/40444/images/question-mark.jpg' width=24px height=20px align='absmiddle' hspace='2'>"

var isValid;
function getObj(id)
{
	return document.getElementById(id);
	
}
function checkValid(id)
{
	var x;	
	if(id == "use")
	{
		x = getObj("username").value;
		if (x==null || x=="") {
			getObj("use").innerHTML = imgq;
		}
		else
			getObj("use").innerHTML = "";			
	}
	else if(id == "pass")
	{
		x=getObj("pw").value;
		if(x == "" || x == null){
			getObj("pass").innerHTML = imgq;
		}
		else
		{
			getObj("pass").innerHTML = "";
		}
	}
}

function checkInput()
{
	isValid=true;
	var x;	
	if(getObj("username").value=="")
	{
			getObj("use").innerHTML = imgq;
			isValid= false;
	}
	else
	{
			getObj("use").innerHTML = "";
            			
	}
	if(getObj("pw").value=="")
	{
			getObj("pass").innerHTML = imgq;
			isValid= false;
	}
	else
	{
			getObj("pass").innerHTML = "";
			
	}
	return isValid;
}