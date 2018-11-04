function open_panel()
{
	slideIt();
	var a=document.getElementById("sidebar");
	a.setAttribute("id","sidebar1");
	a.setAttribute("onclick","close_panel()");
}

function slideIt()
{
	$("#slider-feedback").animate({
		left: '+=306px'
	});
}
	
function close_panel(){
	slideIn();
	a=document.getElementById("sidebar1");
	a.setAttribute("id","sidebar");
	a.setAttribute("onclick","open_panel()");
}

function slideIn()
{
	$("#slider-feedback").animate({
		left: '-=306px'
	});
}