function overlayResize() {
    var windowHeight = jQuery(window).height();
    jQuery('#overlay').height(windowHeight);
}
function semanticFormClick(){
    //$('.ui.checkbox').checkbox();
    //$('.ui.radio.checkbox').checkbox();
    //$('.dropdown').dropdown();
}
$(document).ready(function() {
     setInterval(function() {
            var val = 1;
            if (Math.random() > 0.5) {
                val = Math.floor((Math.random()*10)+1);
            }

            $(".flickr").css("text-shadow", "white 0 0 " + val + "px");
     }, 200);
     overlayResize();
     semanticFormClick();
});
jQuery(this).on('resize', function() {
    overlayResize();
});
