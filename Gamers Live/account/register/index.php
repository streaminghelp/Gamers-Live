<?php
error_reporting(0);

$msg = $_GET["msg"];
if($msg == ""){
$msg = "Never give your password or stream key to another person!";
}

$register_url = "?msg=Registrations are closed, as we are in closed beta."; // real signup is "signup.php"

$beta_account = $_GET['beta'];


// check if key is valid


$inc_path = $_SERVER['DOCUMENT_ROOT'];
$inc_path .= "/config.php";
include_once($inc_path);
			
// connect to database

			
// select thje database we need


// get key
$check_keys = mysql_query("SELECT * FROM beta WHERE b_key='$beta_account' AND active='1'") or die(mysql_error());
$count = mysql_num_rows($check_keys);

if($count == 1){
$register_url = "signup.php";
$msg = "Your beta key is valid, please sign up now! As when you leave the page the key will be disabled!";
// set key as 
$update_key = mysql_query("UPDATE beta SET active='0' WHERE b_key='$beta_account'") or die(mysql_query());
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="author" content="ThemeFuse" />
    <meta name="Description" content="A short description of your company" />
    <meta name="Keywords" content="Some keywords that best describe your business" />
    <title>GAMERS LIVE</title>
    <link href="<?=$conf_site_url?>/style.css" media="screen" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="<?=$conf_site_url?>/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?=$conf_site_url?>/js/preloadCssImages.js"></script>
    <script type="text/javascript" src="<?=$conf_site_url?>/js/jquery.color.js"></script>

    <script type="text/javascript" language="JavaScript" src="<?=$conf_site_url?>/js/general.js"></script>
    <script type="text/javascript" language="JavaScript" src="<?=$conf_site_url?>/js/jquery.tools.min.js"></script>
    <script type="text/javascript" language="JavaScript" src="<?=$conf_site_url?>/js/jquery.easing.1.3.js"></script>

    <script type="text/javascript" language="JavaScript" src="<?=$conf_site_url?>/js/slides.jquery.js"></script>

    <link rel="stylesheet" href="<?=$conf_site_url?>/css/prettyPhoto.css" type="text/css" media="screen" />
    <script src="<?=$conf_site_url?>/js/jquery.prettyPhoto.js" type="text/javascript"></script>

    <!--[if IE 7]>
    <link rel="stylesheet" type="text/css" href="<?=$conf_site_url?>css/ie.css" />
    <![endif]-->
</head>
<body>
<div class="body_wrap thinpage">

<div class="header_image" style="background-image:url(<?=$conf_site_url?>/images/header.png)">&nbsp;</div>

<div class="header_menu">
	<div class="container">
		<div class="logo"><a href="<?=$conf_site_url?>/"><img src="<?=$conf_site_url?>/images/logo.png" alt="" /></a></div>
        <div class="top_login_box"><a href="<?=$conf_site_url?>/account/login/">Sign in</a><a href="<?=$conf_site_url?>/account/register/">Register</a></div>
        <div class="top_search">
        	<form id="searchForm" action="<?=$conf_site_url?>/browse/" method="get">
                <fieldset>
                	<input type="submit" id="searchSubmit" value="" />
                    <div class="input">
                        <input type="text" name="s" id="s" value="Type & press enter" />
                    </div>                    
                </fieldset>
            </form>
        </div>
        
          <!-- topmenu -->
        <div class="topmenu">
                    <ul class="dropdown">
                        <li><a href="<?=$conf_site_url?>/browse/lol/"><span>LoL</span></a></li>
                        <li><a href="<?=$conf_site_url?>/browse/dota2/"><span>Dota 2</span></a></li>
                        <li><a href="<?=$conf_site_url?>/browse/hon/"><span>HoN</span></a></li>
                        <li><a href="<?=$conf_site_url?>/browse/sc2/"><span>SC 2</span></a></li>
                        <li><a href="<?=$conf_site_url?>/browse/wow/"><span>WoW</span></a></li>
                        <li><a href="<?=$conf_site_url?>/browse/callofduty/"><span>Call Of Duty</span></a></li>
                        <li><a href="<?=$conf_site_url?>/browse/minecraft/"><span>Minecraft</span></a></li>
                        <li><a href="<?=$conf_site_url?>/browse/other/"><span>Others</span></a></li>
                        <li><a href="<?=$conf_site_url?>/blog/"><span>Blog</span></a></li>
                        <li><a href="#"><span>More</span></a>                        
                        	<ul>
                                <li><a href="<?=$conf_site_url?>/company/about/"><span>About</span></a></li>
                                <li><a href="<?=$conf_site_url?>/company/support/"><span>Contact</span></a></li>
                                <li><a href="<?=$conf_site_url?>/account/partner/"><span>Partner</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
        	<!--/ topmenu -->
    </div>
</div>     	
<!--/ header -->



<!-- middle -->
<div class="middle full_width">
<div class="container_12">

	<div class="back_title">
    	<div class="back_inner">
		<a href="<?=$conf_site_url?>/"><span>Home</span></a>
        </div>
    </div> 	 
   
    
    <!-- content -->
    <div class="content">
    <br /><br />
    <div class="col_1_3">
                            
                          <form name="register" action="<?=$register_url?>" method="post">
                            
                            <p><label>Display Name</label><br><input class="gamersTextbox" value="" size="20" tabindex="10" type="text" max="30" style="width: 250px"></p>
                            <p><label>Email</label><br><input name="email" id="email" class="gamersTextbox" value="" size="20" tabindex="10" type="text" style="width: 250px"></p>
                            <p><label>Channel Name</label><br><input name="channel_id" id="channel_id" class="gamersTextbox" value="" size="20" tabindex="10" type="text" max="30" min="5" style="width: 250px"></p>
                            
                            <p><label>Password</label><br><input name="password" id="password" class="gamersTextbox" value="" size="20" tabindex="20" type="password" style="width: 250px"></p>
                            
                            <p>By signing up you agree to the <a href="<?=$conf_site_url?>/company/legal/">Terms Of Service</a></p>

                              <a href="#" onclick="document.register.submit()" class="button_link"><span>I agree to the Terms, sign me up!</span></a>
                          </form>
                        </div>
    </div>
    <div class="col_2_3">
    <div class="author-box">
                    <div class="author-description">
                      	<div class="author-text">
                          <h4>Registration Message</h4>
                          <p><?=$msg?></p>
                        </div>
                        <div class="clear"></div>
                	</div>        
                </div>
    </div>
    <!--/ content --> 
    
   
    <div class="clear"></div>
    
</div>
</div>
<!--/ middle -->
<!--/ middle -->

<div class="footer">
<div class="footer_inner">
<div class="container_12">
	
    <div class="grid_8">
    	<h3>Gamers Live</h3>   
		
        <div class="copyright">
		<?=$conf_site_copy?> <br /><a href="<?=$conf_site_url?>/company/legal/">Terms of Service</a> - <a href="<?=$conf_site_url?>/company/support/">Contact</a> -
		<a href="<?=$conf_site_url?>/company/legal/">Privacy guidelines</a> - <a href="<?=$conf_site_url?>/company/support/">Advertise with Us</a> - <a href="<?=$conf_site_url?>/company/about/">About Us</a></p>
		</div>          
    </div>
    
    <div class="grid_4">
    	<h3>Follow us</h3>
        <div class="footer_social">
        	<a href="<?=$conf_site_url?>/facebook/" class="icon-facebook">Facebook</a> 
            <a href="<?=$conf_site_url?>/twitter/" class="icon-twitter">Twitter</a>
            <a href="<?=$conf_site_url?>/rss/" class="icon-rss">RSS</a>
            <div class="clear"></div>
        </div>
    </div>
    
    <div class="clear"></div>
</div>
</div>
</div>   

</div>   
</body>
</html>
