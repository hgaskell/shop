$( ".product-description" ).click(function() {
    $( this ).siblings( ".hidden-content" ).toggleClass( "active" );
  });

var count = 1;

$(".plus-qty").click(function(){
    count++;
    $(".quantity").val(count);
});

$(".minus-qty").click(function(){
    if(count <= 1){
        return;
    }
    count--;
    $(".quantity").val(count);
});

$('.sort-checkbox').on('change', function() {
    $(this).closest('form').submit();
});

if( $(".cart").length ) {
    $(".lower-level-menu").hide();
}

$(".menu-login").hide();

$(".showAccount").click(function(){
    $(".menu-login").fadeToggle();
    
    if($(".showAccount").hasClass("open")){
        $(".showAccount").removeClass("open");
        $(".showAccount").text('Account');
    } else {
        $(".showAccount").addClass("open");
        $(".showAccount").text('X');
    }

});

$(".register-header").click(function(){
    if( $(".register-header").hasClass("open")){
        $(".register-header").removeClass("open");
        $(".register-form").hide();
        $(".login-section").show();
        $(".login-header h2").text("Login");
        $("register-message p").text("Not signed in? Click the button below and register.");
        $(".register-header h2").text("Register");

    } else {
        $(".register-header").addClass("open");
            $(".register-form").show();
            $(".login-section").hide();
            $(".login-header h2").text("Register");
            $(".register-message p").text("Already registered? Click the button below to login.");
            $(".register-header h2").text("Login");
    }
});

if( $('.unsuccessful-message').length ){
    $('.user-message').css('background-color','#ff0000');
    $('.user-message').css('height','37px');
}

if( $('.successful-message').length ){
    $('.user-message').css('background-color','#00FF00');
    $('.user-message').css('height','37px');
}


