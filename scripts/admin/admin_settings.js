function sampleFunc(user_identifier,ul_identifier)
{
	$(user_identifier).hover(
		function(){
		$(ul_identifier).css({"visibility":"visible","opacity":"1"});
		},
		function(){
		$(ul_identifier).css({"visibility":"hidden","opacity":"0"});	
	});
	console.dir(user_identifier);
	console.dir(ul_identifier);
}