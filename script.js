function deleteCookie(name)
{
	document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

function clearLogin(cookie_name)
{
	var cookie_date = new Date();  // current date & time
	cookie_date.setTime (cookie_date.getTime() - 1);
	document.cookie = cookie_name += "=; Path=/; expires=" + cookie_date.toGMTString();
	//document.cookie = 'AssignmentID=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
	//document.cookie = 'CourseID=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
	//document.cookie = 'CourseName=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}