<?php	require_once('includes/config.php'); 
if(@$_REQUEST['action']=='contact')
{?>
<?php echo $__CONFIG['VRE_CONTACTUS']['BUTTON']['text']; ?>

<?php } else {?>
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
position:fixed;

border-radius:0px 7px 7px 0px;
-moz-border-radius:0px 7px 7px 0px;
-webkit-border-radius:0px 7px 7px 0px;

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

<?php }?>