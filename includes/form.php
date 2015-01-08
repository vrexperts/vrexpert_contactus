<?php	require_once('config.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Unique Utah Homes</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../popup/js-css/contactcss.css" rel="stylesheet" type="text/css" />
<style>
.error {
border: 2px solid #F00 !important;
}
</style>
<script src ="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>

function preloadImage(url)
{
    var img = new Image();
    img.src = url;
}

$(function() {
	
	/*
    var appId = '<?php echo $__CONFIG['VRE_CONTACTUS']['FB']['appId']; ?>' //'125598177640725';
    var siteRoot = '';

  window.fbAsyncInit = function() {
    FB.init({
      appId      : appId,
      channelURL : '///channel.html', // Channel File
      status     : true,
      cookie     : true,
      oauth      : true,
      xfbml      : true
    });
    $(document).trigger('fbload');
  };


  (function(d){
     var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "http://connect.facebook.net/en_US/all.js#xfbml=1&appId=" + appId;
     d.getElementsByTagName('head')[0].appendChild(js);
   }(document));



   $(document).on(
    'fbload',  //  <---- HERE'S OUR CUSTOM EVENT BEING LISTENED FOR
    function(){
        //some code that requires the FB object
        //such as...
        FB.getLoginStatus(function(res){
            if( res.status == "connected" ){
                FB.api('/me', function(fbUser) {
					
					$('input[name="contact_name"]').val(fbUser.name);
					$('input[name="contact_email"]').val(fbUser.email);
                    //alert(fbUser.name  + " "  + fbUser.email);
					//console.log(fbUser);
                });
            }else {
				
			
			FB.login(function (response) {

		            if (response.status === "connected") {

                        var uID = response.authResponse.userID;

                        console.log(uID);

                     	FB.api('/me', function(fbUser) {
							console.log(fbUser);
					
							$('input[name="contact_name"]').val(fbUser.name);
							$('input[name="contact_email"]').val(fbUser.email);
        		            //alert(fbUser.name  + " "  + fbUser.email);
							//console.log(fbUser);
                		});

                    } else if (response.status === "not_authorized") {

                        //authCancelled. redirect
                    }
                },
                {
                    scope: 'email'
                }
            );
			
			
				
			}
        });

    }
);

*/

	preloadImage('<?php echo !empty($__CONFIG['VRE_CONTACTUS']['OFFER']['image_url']) ? $__CONFIG['VRE_CONTACTUS']['OFFER']['image_url'] : '' ; ?>');



	$('.popup form').on('submit', function(e){
		e.preventDefault();
		$.ajax({
		   type: "POST",
		   url: "email.php",
		   data: $(this).serialize(),
		   success: function(response) {
			 if(response == "Message Sent") {
				 $('.popup form')[0].reset();
				 $('#msg_email').attr('class','msg_success');
				 $('#msg_email').html("Message Sent.");
				 window.parent.location.href = "<?php echo !empty($__CONFIG['VRE_CONTACTUS']['EMAIL']['redirect_success']) ? $__CONFIG['VRE_CONTACTUS']['EMAIL']['redirect_success']  : "http://www.surrealmedialabs.com/thankyou-photography.php"  ; ?>";
				 window.close();
			 }else {
				 $('#msg_email').attr('class','msg_error');
				 //$('#msg_email').html("Validation errors occurred. Please confirm the fields and submit it again.");
				 $('#msg_email').html(response);
			 }
		   }
		});
	});
});

</script>

<style>
body {
background: <?php echo $__CONFIG['VRE_CONTACTUS']['FORM']['color']; ?> !important;
}

label {
color:<?php echo $__CONFIG['VRE_CONTACTUS']['FORM']['text']; ?> !important;
</style>

</head>


<body<?php echo !empty($__CONFIG['VRE_CONTACTUS']['OFFER']['image_url']) ? " style=\"background: url('{$__CONFIG['VRE_CONTACTUS']['OFFER']['image_url']}') no-repeat scroll 0 0 / 830px 400px rgba(0, 0, 0, 0); \"" : '' ; ?>>



<!--<div class="fb-like" data-href="<?php echo $__CONFIG['VRE_CONTACTUS']['SOCIAL_URL']['fb']; ?>" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div>

<a class="twitter-follow-button" href="<?php echo $__CONFIG['VRE_CONTACTUS']['SOCIAL_URL']['twitter']; ?>" data-show-count="false" data-size="small" data-width="125px" data-align="left" data-show-screen-name="true"  data-lang="en">Follow @SMLIndia</a>
  	<script type="text/javascript">
		window.twttr = (function (d, s, id) {
  			var t, js, fjs = d.getElementsByTagName(s)[0];
  			if (d.getElementById(id)) return;
  			js = d.createElement(s); js.id = id;
  			js.src= "https://platform.twitter.com/widgets.js";
  			fjs.parentNode.insertBefore(js, fjs);
  			return window.twttr || (t = { _e: [], ready: function (f) { t._e.push(f) } });
		}(document, "script", "twitter-wjs"));
</script>-->


<div class="popup">

  <div id="msg_email"></div>
  <form action="" method="post">
  <?php echo !empty($__CONFIG['VRE_CONTACTUS']['OFFER']['title']) ? "<p><strong>{$__CONFIG['VRE_CONTACTUS']['OFFER']['title']}</strong></p>" : '' ?>
  <?php echo !empty($__CONFIG['VRE_CONTACTUS']['OFFER']['description']) ? "<p>{$__CONFIG['VRE_CONTACTUS']['OFFER']['description']}</p>" : '' ?>
  	<input type="hidden" name="action" value="User" />
  	<label>Name:</label>
    <input type="text" name="contact_name" class="txt" value="" required="required" />
    <div class="pad5"></div>

	<label>Email:</label>
    <input type="email" name="contact_email" class="txt" value="" required="required" />
  	<div class="pad5"></div>
  	
    <label>Phone:</label> 
    <input type="text" name="contact_no" class="txt" value="" pattern="^(?:\(\d{3}\)|\d{3})[- ]?\d{3}[- ]?\d{4}$" />
	<div class="pad5"></div>

	<label>Comments:</label>
    <textarea name="message" class="txt" rows="0" required="required" ></textarea>
    <div class="pad5"></div>

  	<label>&nbsp;</label>
    <input type="submit" class="submit" value="Submit"/>
 </form>


 <!--<div class="fb-login-button" data-scope="email" data-show-faces="true" data-width="1" data-max-rows="1">Get Profile</div>-->


</div>


</body>
</html>