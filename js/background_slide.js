var idx = 1;

show_slides();

/*************
 * functions *
 *************/

 function show_slides()
 {
 	var max_idx = 5;

 	var file_name = "http://edu.다솜.com/res/bg/" + idx.toString() + ".png";
 	var target = "url('" + file_name + "')";

 	$("#site-wrapper").css({'background-image':target});

 	idx++;
 	if(idx > max_idx) { idx = 1; }

 	setTimeout(show_slides, 13000);
 }