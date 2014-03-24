




function validateForm(eventsForm)
{
	
	if (eventsForm.ud_location.value == "")
	{
		alert("Please enter the school year");
		myForm.ud_location.focus();
		return (false);
	}

	
return (true);
}