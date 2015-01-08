<?php	require_once('includes/config.php'); 
//print_r($__CONFIG);die;
?>
<html>
<head>
<link rel="stylesheet" href="popup/js-css/thickbox.css" type="text/css" media="screen">
<script src="popup/js-css/jquery-1.5.min.js" type="text/javascript"></script>
<script>var tb_pathToImage = "popup/images/Ajax_Loading.gif";</script>
<script src="popup/js-css/thickbox.js" type="text/javascript"></script>

<script>

function createCookie(name,value,days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name,"",-1);
}

	(function($){

		$(function(){
			
			var hide_enquiry_form = readCookie('hide_enquiry_form')
			if (!hide_enquiry_form) {
				createCookie('hide_enquiry_form','true',1);
			    $('.thickbox').trigger('click');
			}


		});
	
	})(jQuery);




</script>
<style>
body{ margin:0; padding:0;}

.vre-cont-btn{
width: <?php echo $__CONFIG['VRE_CONTACTUS']['BUTTON']['width']; ?>px;
height: <?php echo $__CONFIG['VRE_CONTACTUS']['BUTTON']['height']; ?>px;
position: relative;
top:200px;
overflow: hidden;
font-family:Arial, Helvetica, sans-serif;
font-size:18px;
text-align:center;

border-radius:0px 7px 7px 0px;
-moz-border-radius:0px 7px 7px 0px;
-webkit-border-radius:0px 7px 7px 0px;

/*background: rgb(30,87,153); /* Old browsers */
/*background: -moz-linear-gradient(left,  rgba(30,87,153,1) 0%, rgba(125,185,232,1) 100%); /* FF3.6+ */
/*background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(30,87,153,1)), color-stop(100%,rgba(125,185,232,1))); /* Chrome,Safari4+ */
/*background: -webkit-linear-gradient(left,  rgba(30,87,153,1) 0%,rgba(125,185,232,1) 100%); /* Chrome10+,Safari5.1+ */
/*background: -o-linear-gradient(left,  rgba(30,87,153,1) 0%,rgba(125,185,232,1) 100%); /* Opera 11.10+ */
/*background: -ms-linear-gradient(left,  rgba(30,87,153,1) 0%,rgba(125,185,232,1) 100%); /* IE10+ */
/*background: linear-gradient(to right,  rgba(30,87,153,1) 0%,rgba(125,185,232,1) 100%); /* W3C */
/*filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1e5799', endColorstr='#7db9e8',GradientType=1 ); /* IE6-9 */



background: <?php echo $__CONFIG['VRE_CONTACTUS']['BUTTON']['color']; ?>; /* Old browsers */
background: -moz-linear-gradient(left,  <?php echo $__CONFIG['VRE_CONTACTUS']['BUTTON']['color']; ?> 0%, <?php echo $__CONFIG['VRE_CONTACTUS']['BUTTON']['color_gradient']; ?> 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, right top, color-stop(0%,<?php echo $__CONFIG['VRE_CONTACTUS']['BUTTON']['color']; ?>), color-stop(100%,<?php echo $__CONFIG['VRE_CONTACTUS']['BUTTON']['color_gradient']; ?>)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(left,  <?php echo $__CONFIG['VRE_CONTACTUS']['BUTTON']['color']; ?> 0%,<?php echo $__CONFIG['VRE_CONTACTUS']['BUTTON']['color_gradient']; ?> 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(left,  <?php echo $__CONFIG['VRE_CONTACTUS']['BUTTON']['color']; ?> 0%,<?php echo $__CONFIG['VRE_CONTACTUS']['BUTTON']['color_gradient']; ?> 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(left,  <?php echo $__CONFIG['VRE_CONTACTUS']['BUTTON']['color']; ?> 0%,<?php echo $__CONFIG['VRE_CONTACTUS']['BUTTON']['color_gradient']; ?> 100%); /* IE10+ */
background: linear-gradient(to right,  <?php echo $__CONFIG['VRE_CONTACTUS']['BUTTON']['color']; ?> 0%,<?php echo $__CONFIG['VRE_CONTACTUS']['BUTTON']['color_gradient']; ?> 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $__CONFIG['VRE_CONTACTUS']['BUTTON']['color']; ?>', endColorstr='<?php echo $__CONFIG['VRE_CONTACTUS']['BUTTON']['color_gradient']; ?>',GradientType=1 ); /* IE6-9 */




}

.vre-cont-btn .vrequick{
width: 120px;
position: absolute;
left: 0px;
height: 120px;

z-index:2000;
transform:rotate(-90deg);
-webkit-transform: rotate(-90deg);
-moz-transform: rotate(-90deg);
-o-transform: rotate(-90deg);
-ms-transform: rotate(-90deg);
}

.thickbox { position:static;
text-decoration:none;
color:#ffffff;
font-size:bold;
line-height:40px;
display:block;
}

</style>

<style>

#TB_title {
background: <?php echo $__CONFIG['VRE_CONTACTUS']['FORM']['top_color']; ?> !important;
}

</style>
</head>
<body>
<div  class="vre-cont-btn">
<div class="vrequick">
<a title="Quick Contact" class="thickbox" href="includes/form.php?&amp;KeepThis=true&amp;TB_iframe=true&amp;height=400&amp;width=800"><?php echo $__CONFIG['VRE_CONTACTUS']['BUTTON']['text']; ?></a>
</div>
</div>
</body>
</html>