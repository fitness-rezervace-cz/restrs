<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>RS REST API</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="shortcut icon" href="/favicon.ico" />
    <meta name="robots" content="noindex" />
	<style type="text/css"><!--
    body {
        color: #444444;
        background-color: #EEEEEE;
        font-family: 'Trebuchet MS', sans-serif;
        font-size: 80%;
    }
    
	.config{
		margin: 15px;
	}
	
	.lekce{
		margin: 15px;
		padding: 5px;
		border: 1px solid black;
	}
	
    --></style>
</head>
<body>
	
	 <?php	
	require_once 'restrs/Rs.php';	
	?>
	
	<a href="<?=Rs::WWW?>kalendar_vypis/kalendar_vypis_login">Login</a> | 
	<a href="<?=Rs::WWW?>sys_member/registrace/?clear=1">Registrace</a>
	
    <?php
	
	include 'restrs/zobraz_akce.php';
	
	?>
</body>
</html>
