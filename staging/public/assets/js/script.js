
function overlayResize() {
    var windowHeight = jQuery(window).height();
    jQuery('#overlay').height(windowHeight);
}
function semanticFormClick(){
    $('.ui.checkbox').checkbox();
    $('.ui.radio.checkbox').checkbox();
    $('.dropdown').dropdown();
}
function btnLoading(btnSelector, isButton){
    if (isButton === true) {
        $(btnSelector).click(function(){
            $(btnSelector).addClass('loading').addClass('disabled');
            console.log("disable");
        });
    }
    else {
        $(btnSelector).addClass('loading').addClass('disabled');
    }
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
$('.signIn form button').click(function(){
    if ($('input[name="e-mail"]').val() == "admin@payponse.com" && $('input[name="password"]').val() == "payponse") {
        localStorage.setItem('loginOk', 1);
        btnLoading('.signIn form button', false);
        window.location.href = "dashboard.php";
    }
});
$('.ui.form')
  .form({
    fields: {
      name: {
        identifier : 'e-mail',
        rules: [
          {
            type : 'email'
          }
        ]
    },
    pw: {
      identifier : 'password',
      rules: [
        {
          type : 'minLength[5]'
        }
      ]
    },
    markname: {
      identifier : 'mark-name',
      rules: [
        {
          type : 'regExp[^[A-Za-z0-9]+$]'
        }
      ]
    }
    }
});
