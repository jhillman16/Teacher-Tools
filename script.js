function deleteCookie(name)
{
	document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

function clearLogin()
{
	document.cookie = AssignmentID +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
	document.cookie = CourseID +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
	document.cookie = CourseName +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}