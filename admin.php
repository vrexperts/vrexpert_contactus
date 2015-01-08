<?php
	require_once('includes/config.php');
	$admin_pwd = $__CONFIG['VRE_CONTACTUS']['ADMIN_PASSWORD'];
	
	if(isset($_POST) && !empty($_POST) ) {
	
		if($admin_pwd !== $_POST['admin_pwd']) {
			die('Not Authorized');
		}
		unset($_POST['admin_pwd']);
		
	    $myfile = fopen("data.txt", "w") or die("Unable to open file!");
		$txt = serialize($_POST);
		fwrite($myfile, $txt);
		fclose($myfile);
	}
	
	if(file_exists('data.txt')) {
		$myfile = fopen("data.txt", "r") or die("Unable to open file!");
		$file_data = fread($myfile,filesize("data.txt"));
		$file_data_arr = unserialize($file_data);
		//print_r($file_data_arr);
		extract($file_data_arr);
		fclose($myfile);
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Unique Utah Homes</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="popup/js-css/contactcss.css" rel="stylesheet" type="text/css" />
<style>
.error {
border: 2px solid #F00 !important;
}
</style>

<script>

function _(elementID)
             {
             return document.getElementById(elementID);
             }

function uploadFile()
              {
              var file = _("image1").files[0];
			  var formdata = new FormData();
              formdata.append("file1", file);
              var ajax = new XMLHttpRequest();
              ajax.upload.addEventListener("progress", myProgressHandler, false);
              ajax.addEventListener("load", myCompleteHandler, false);
              ajax.addEventListener("error", myErrorHandler, false);
              ajax.addEventListener("abort", myAbortHandler, false);
              ajax.open("POST", "file_upload_parser.php"); ajax.send(formdata);
              }
			  
function myProgressHandler(event)
         {
           _("loaded_n_total").innerHTML =
                     "Uploaded "+event.loaded+" bytes of "+event.total;
                      var percent = (event.loaded / event.total) * 100;
           _("progressBar").value = Math.round(percent);
           _("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
         }
function myCompleteHandler(event)
         {
           _("status").innerHTML = event.target.responseText;
           _("progressBar").value = 0;
		   
		   	var fullPath = document.getElementById('image1').value;
			if (fullPath) {
				var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
				var filename = fullPath.substring(startIndex);
				if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
					filename = filename.substring(1);
				}
				_("offer_image_url").value = "http://<?php echo $_SERVER['HTTP_HOST']; ?>/<?php echo basename(getcwd()); ?>/uploads/" + filename;
			}
		   
          }
function myErrorHandler(event)
          {
           _("status").innerHTML = "Upload Failed";
          }
function myAbortHandler(event)
          {
          _("status").innerHTML = "Upload Aborted";
          }
</script>

</head>

<body>
<div class="popup1">
<form action="" method="post" enctype="multipart/form-data">
  	<h1>VR Experts Contact Us (ADMIN)</h1>
    
    <label>Admin Password:</label>
    <input type="password" name="admin_pwd" class="txt" value="" required="required" />
    <div class="pad5"></div>
    
    <fieldset>
    	<legend>Offer Configuration</legend>
        <label>Offer Title:</label>
        <input type="text" name="offer_title" class="txt" value="<?php echo $offer_title; ?>" />
        <div class="pad5"></div>
    
        <label>Offer Description:</label>
        <textarea name="offer_description" class="txt" rows="5" ><?php echo $offer_description; ?></textarea>
        <div class="pad5"></div>
        
        <input type="file" name="file1" id="image1"><br>
        <input type="button" value="Upload File" onclick="uploadFile()">
        <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
        <h3 id="status"></h3>
        <p id="loaded_n_total"></p>
        <div class="pad5"></div>
        
        <label>Offer Image Url:</label>
        <input type="url" id="offer_image_url" name="offer_image_url" class="txt" value="<?php echo $offer_image_url; ?>" />
        <div class="pad5"></div>
    </fieldset>
    
    <fieldset>
    	<legend>Email Configuration</legend>
        
        <label>Email To: (Seperated by comma)</label>
        <input type="text" name="email_to" class="txt" value="<?php echo $email_to; ?>" required="required" />
        <div class="pad5"></div>
        
        <label>Email From: </label>
        <input type="email" name="email_from" class="txt" value="<?php echo $email_from; ?>" required="required" />
        <div class="pad5"></div>
        
        <label>Email Subject:</label>
        <input type="text" name="email_subject" class="txt" value="<?php echo $email_subject; ?>" required="required" />
        <div class="pad5"></div>
        
        <label>Email Redirect Success Url:</label>
        <input type="url" name="email_redirect_success" class="txt" value="<?php echo $email_redirect_success; ?>" required="required" />
        <div class="pad5"></div>
        
        
    </fieldset>
    
    <fieldset>
    	<legend>Social Media Configuration</legend>
        
        <label>Facebook Page:</label>
        <input type="url" name="social_fb" class="txt" value="<?php echo $social_fb; ?>" required="required" />
        <div class="pad5"></div>
        
        <label>Twitter Page: </label>
        <input type="url" name="social_twitter" class="txt" value="<?php echo $social_twitter; ?>" required="required" />
        <div class="pad5"></div>
        
        
    </fieldset>
    
     <fieldset>
    	<legend>Button Setting</legend>
        
        <label>Bg Color</label>
        <input type="color" name="button_color" class="txt" value="<?php echo $button_color; ?>" required="required" />
        <div class="pad5"></div>
        
         <label>Bg Color(Gradient)</label>
        <input type="color" name="button_color_gradient" class="txt" value="<?php echo $button_color_gradient; ?>" required="required" />
        <div class="pad5"></div>
        
        
        <label>Text</label>
        <input type="text" name="button_text" class="txt" value="<?php echo $button_text; ?>" required="required" />
        <div class="pad5"></div>
        
        <label>Text Color</label>
        <input type="color" name="button_text_color" class="txt" value="<?php echo $button_text_color; ?>" required="required" />
        <div class="pad5"></div>
        
        <label>Width</label>
        <input type="text" name="button_width" class="txt" value="<?php echo $button_width; ?>" required="required" />
        <div class="pad5"></div>
        
        <label>Height</label>
        <input type="text" name="button_height" class="txt" value="<?php echo $button_height; ?>" required="required" />
        <div class="pad5"></div>
        
      
        
        
    </fieldset>
    
    
    
    
    <fieldset>
    	<legend>Form Setting</legend>
        
        <label>BG Color</label>
        <input type="color" name="form_color" class="txt" value="<?php echo $form_color; ?>" required="required" />
        <div class="pad5"></div>
        
        
        
        <label>Text Color</label>
        <input type="color" name="form_text_color" class="txt" value="<?php echo $form_text_color; ?>" required="required" />
        <div class="pad5"></div>
        
        <label>Top Bg Color</label>
        <input type="color" name="form_top_color" class="txt" value="<?php echo $form_top_color; ?>" required="required" />
        <div class="pad5"></div>
        
       
       
        
    </fieldset>
    
    
    
    
    

  	<label>&nbsp;</label>
    <input type="submit" class="submit" value="Submit"/>
 </form>
 </div>
 
 </body>
 </html>