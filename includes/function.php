<?php
	require("config.php");
	//require("apis/PHPMailer/class.phpmailer.php");
	
	
	
	function logged_gmail_user() {
		global $__CONFIG;
		require_once 'apis/googleapi/autoload.php';
		
		$redirect_uri = $__CONFIG['VRE_CONTACTUS']['GOOGLE']['redirectUri'];
		
		$client = new Google_Client();
		$client->setApplicationName("PHP Google OAuth Login Example");
		$client->setClientId($__CONFIG['VRE_CONTACTUS']['GOOGLE']['clientId']);
		$client->setClientSecret($__CONFIG['VRE_CONTACTUS']['GOOGLE']['clientSecret']);
		$client->setRedirectUri($redirect_uri);
		$client->setDeveloperKey($__CONFIG['VRE_CONTACTUS']['GOOGLE']['apiKey']);
		$client->addScope("https://www.googleapis.com/auth/userinfo.email");
		
		$objOAuthService = new Google_Service_Oauth2($client);
		
		
		//Logout
		if (isset($_REQUEST['logout'])) {
		  unset($_SESSION['access_token']);
		  $client->revokeToken();
		  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL)); //redirect user back to page
		}
		
		//Authenticate code from Google OAuth Flow
		//Add Access Token to Session
		if (isset($_GET['code'])) {
		  $client->authenticate($_GET['code']);
		  $_SESSION['access_token'] = $client->getAccessToken();
		  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
		}
		
		//Set Access Token to make Request
		if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
		  $client->setAccessToken($_SESSION['access_token']);
		}
		
		//Get User Data from Google Plus
		//If New, Insert to Database
		if ($client->getAccessToken()) {
		  $userData = $objOAuthService->userinfo->get();
		  if(!empty($userData)) {
			  echo '<pre>'; print_r($userData); echo '</pre>';
			/*  
			$objDBController = new DBController();
			$existing_member = $objDBController->getUserByOAuthId($userData->id);
			if(empty($existing_member)) {
				$objDBController->insertOAuthUser($userData);
			}
			*/
		  }
		  $_SESSION['access_token'] = $client->getAccessToken();
		} else {
		  $authUrl = $client->createAuthUrl();
		  header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
		}
		
		
		return false;
		
	}
	
	

	function logged_fb_user() {
		global $__CONFIG;
		require ('apis/fbapi/facebook-php-sdk-master/src/facebook.php');
		
		// Create our Application instance (replace this with your appId and secret).
		$facebook = new Facebook( $__CONFIG['VRE_CONTACTUS']['FB'] );

		$user = $facebook->getUser();
		
		
		if ($user) {
		  try {
			$user_profile = $facebook->api('/me');
			$facebook->destroySession();
			return $user_profile;
		  } catch (FacebookApiException $e) {
		    error_log($e);
		   	$user = null;
		  }
		}


		$loginUrl = $facebook->getLoginUrl(array(
				'scope' => 'email', // Permissions to request from the user
			));
			
			header("Location: ".$loginUrl);


		return false;

		if ($user) {
			
			if($_SESSION['SEND'] == 'send'){
					  $user_name = isset($_POST['name']) ? $_POST['name'] : 'Admin';
					  $user_email = isset($_POST['email']) ? $_POST['email'] : 'admin@surrealmedialabs.com';
					  $to = "arun.kmr1602@gmail.com";
					  $subject ="Enquiry Form";
					  $msg ="<b><font  size='+2' color='red'>Enquiry Form</font></b><br><br>";
					  $msg .="<b><font color='blue'>Name:</font></b>"." ".@$_SESSION['FULLNAME']."<br><br>";
					 // $msg .="<b><font color='blue'>Contact No.:</font></b>"." ".$_POST['phone']."<br><br>";
					  $msg .="<b><font color='blue'>Email:</font></b>"." ".@$_SESSION['EMAIL']."<br><br>";
					  $headers  = 'MIME-Version: 1.0' . "\r\n";
					  $headers .= 'From:'.$user_name.'<'.$user_email.'>' . "\r\n";
					  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					  //mail($to,$subject,$msg,$headers);
				}
			//echo '<pre>';print_r($user_profile);echo '</pre>';
			$facebook->destroySession();
			//print_r($_SESSION);die;
			//header("Location: fb_data.php");
		} else {
			$loginUrl = $facebook->getLoginUrl(array(
				'scope' => 'email', // Permissions to request from the user
			));
			//header("Location: ".$loginUrl);
		}
	
		
		
	}