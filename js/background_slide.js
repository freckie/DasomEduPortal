var wrapper = document.getElementById("site-wrapper");

show_slides();

/*************
 * functions *
 *************/

 function show_slides()
 {
 	var max_idx = 5;

 	var idx = 1;
 	var file_name = "http://edu.다솜.com/res/bg/" + idx.toString() + ".png";
 	wrapper.style.backgroundImage = "url('" + file_name + "')";

 	idx++;
 	if(idx > max_idx) { idx = 1; }

 	setTimeout(show_slides, 3500);
 }