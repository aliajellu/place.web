<?php
// load vitals
define('PLACEWEB_INCLUDE_PATH', 'include/');
require(PLACEWEB_INCLUDE_PATH.'vitals.inc.php');


// redirect to login if user if NOT logged in
if(!$_SESSION['access']) 
{
	$PLACEWEB_CONFIG['errors'][] = "NO user is logged in"; 
	$action= 'login';
	
} else {
	
	if(isset($_REQUEST['action']) && $_REQUEST['action']!='')
	{
		$action= $_REQUEST['action'];
	} else {
		$action= 'none';
	}
		
} // end if

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang='en' xml:lang='en' xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
//<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
//<META content="text/html; charset=UTF-8" http-equiv=Content-Type>
?>
	<title><?php echo $PLACEWEB_LANG['en']['page_title']?></title>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<?php 
	require(PLACEWEB_INCLUDE_PATH.'js.inc.php');
	require(PLACEWEB_INCLUDE_PATH.'css.inc.php');
	
	if($action=="addExample" || $action=="addQuestion")
	{
		require(PLACEWEB_INCLUDE_PATH.'tinymce.head.inc.php');
	}
	?>
	<?php 
	if($action=="web")
	{
	?>
    <script type="text/javascript" src="d3/d3.js"></script>
    <script type="text/javascript" src="d3/d3.geom.js"></script>
    <script type="text/javascript" src="d3/d3.layout.js"></script>
    <link type="text/css" rel="stylesheet" href="d3/examples/force/force.css"/>
    <?php 
	} // end if
    ?>
</head>
<body>
<div id="container">
	<?php 
	require(PLACEWEB_INCLUDE_PATH.'header.inc.php');
	?>
	
	<div id="main_content">
		<a name="content"></a>
		<?php 
		switch ($action) 
		{
	    case "login":
	        require(PLACEWEB_INCLUDE_PATH.'login.form.inc.php');
	        break;
	    case "home":
	        require(PLACEWEB_INCLUDE_PATH.'home.inc.php');
	        break;
	    case "preferences":
	        require(PLACEWEB_INCLUDE_PATH.'preferences.inc.php');
	        break;
	    case "addExample":
	        require(PLACEWEB_INCLUDE_PATH.'addExample.inc.php');
	        break;
	    case "addQuestion":
	        require(PLACEWEB_INCLUDE_PATH.'addQuestion.inc.php');
	        break;
	  	case "discussion":
	        require(PLACEWEB_INCLUDE_PATH.'discussion.inc.php');
	        break;
	    case "web":
	        require(PLACEWEB_INCLUDE_PATH.'web.inc.php');
	        break;
	    case "test":
	        require(PLACEWEB_INCLUDE_PATH.'test.inc.php');
	        break;
		}
		?>
	</div><!-- /main_content --> 
		<?php 
		require(PLACEWEB_INCLUDE_PATH.'footer.inc.php');
		?>
</div><!-- /container -->

<div id="debugMode">
<?php if($PLACEWEB_CONFIG['debugMode'])
{
	$errorHtml = "";
	
	$PLACEWEB_CONFIG['errors'][] = 'Action: '.$action;
	
	foreach ($PLACEWEB_CONFIG['errors'] as $error)
	{
		$errorHtml .= "<p>".$error."</p>";
	}
	
	echo $errorHtml;
}
?>
</div>
</body>
</html>