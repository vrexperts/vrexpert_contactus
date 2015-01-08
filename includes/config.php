<?php

	$__CONFIG['VRE_CONTACTUS']['ADMIN_PASSWORD'] = '123456'; /// Change password as you wish

	$server_host = str_replace('www.','',$_SERVER['HTTP_HOST']);	

	$offer_image_url = ''; $offer_title=''; $offer_description='';$button_color='';
	
	$button_text='';
	$button_text_color='';
	$button_width='';
	$button_height='';
	
	 $form_color='';
      $form_text_color='';
      $form_top_color='';
	  $button_color_gradient='';
        

	$email_to = "support@{$server_host}";
	$email_from = "admin@{$server_host}";
	$email_subject = "Enquiry on {$server_host}";
	$email_redirect_success = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/thank-you.html';
	
	$social_fb = 'https://www.facebook.com/vrexperts';
	$social_twitter = 'https://www.twitter.com/vrexperts';
	

	if(file_exists('../data.txt')) {
		$myfile = fopen("../data.txt", "r") or die("Unable to open file!");
		$file_data = fread($myfile,filesize("../data.txt"));
		$file_data_arr = unserialize($file_data);
		extract($file_data_arr);
		fclose($myfile);
	}
	
	if(file_exists('data.txt')) {
		$myfile = fopen("data.txt", "r") or die("Unable to open file!");
		$file_data = fread($myfile,filesize("data.txt"));
		$file_data_arr = unserialize($file_data);
		extract($file_data_arr);
		fclose($myfile);
	}


	$__CONFIG['VRE_CONTACTUS']['OFFER'] = array(
											'image_url' => $offer_image_url,
											'title' => $offer_title,
											'description' => $offer_description
											);
	

	$__CONFIG['VRE_CONTACTUS']['SOCIAL_URL'] = array (
									'fb'  => $social_fb,
									'twitter' => $social_twitter
									);

	
	$__CONFIG['VRE_CONTACTUS']['FB'] = array (
									'appId'  => '125598177640725',
									'secret' => 'b6c914efa5d41fe3a180a2dae3047bc1'
									);
									


	$__CONFIG['VRE_CONTACTUS']['GOOGLE'] = array (
									'clientId'  => '74729835998-pockbrm42cavk92s7h9as49ml8klhsgu.apps.googleusercontent.com',
									'clientSecret' => '3b5aXtlgXoVrza4pFXbkCROV',
									'apiKey' => 'AIzaSyCR8pnhBgIbpjeHJOByh4EEhsccms36fQs',
									'redirectUri' => "http://". $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']
									
									);
									

	$__CONFIG['VRE_CONTACTUS']['EMAIL'] = array (
									'from'  => $email_from,
									'to' => $email_to, /// multiple use comma
									'subject' => $email_subject,
									'redirect_success' => $email_redirect_success
									
									);
									
	$__CONFIG['VRE_CONTACTUS']['BUTTON'] = array (
									 'color'  => $button_color,
									 'color_gradient'  =>$button_color_gradient,
									 'text'  =>$button_text,
	                                 'text_color' =>$button_text_color,
	                                 'width'=>$button_width,
	                                 'height'=> $button_height
									);
									
									
									
	$__CONFIG['VRE_CONTACTUS']['FORM'] = array (
									 'color'  => $form_color,
									 'text'  =>$form_text_color,
	                                 'top_color' =>$form_top_color,
	                                 
									);
									
							
									