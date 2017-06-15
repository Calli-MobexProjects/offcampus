function LetterStatus(pendCount)
{
	if (pendCount > 0) 
	{
		$("a#pend").addClass("pulse");
	}
	else{
		$("a#pend").removeClass("pulse");
	}
	console.log("created function value->variable");
	console.dir(pendCount);

}