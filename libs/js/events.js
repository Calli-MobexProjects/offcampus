	function HoverEffect(generated_lect_overlay_id,get_generated_image_id,get_generated_checkbox_id)
	{
		$(generated_lect_overlay_id).hover(function(){
				$(get_generated_image_id).css({"visibility":"hidden","opacity":"0"});
				$(get_generated_checkbox_id).css({"visibility":"visible","opacity":"1"});
			},
			function(){
				$(get_generated_image_id).css({"visibility":"visible","opacity":"1"});
				$(get_generated_checkbox_id).css({"visibility":"hidden","opacity":"0"});
			});
	}