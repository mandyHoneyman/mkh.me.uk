<?php

// if the url field is empty
if(isset($_POST['url']) && $_POST['url'] == ''){

	// then send the form to your email
	mail( 'you@yoursite.com', 'Contact Form', print_r($_POST,true) );
}

// otherwise, let the spammer think that they got their message through

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>edtechs.info || Mandy Honeyman home on the web</title>

	<meta name="keywords" content="mandy honeyman, mkh, madmkh, cv, web design, css" />
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <link rel="stylesheet" href="css/madstyle.css" type="text/css" />
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.2.min.js" type="application/javascript">
	</script>
	<script type="text/javascript">
    var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
    document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	</script>
<script type="text/javascript">
	try {
		var pageTracker = _gat._getTracker("UA-10877441-1");
		pageTracker._trackPageview();
		} catch(err) {}
</script>
</head>
<body>
  <div id="header">
        <p>Mandy <span class="pink">Honeyman</span> <span style="color: #699; font-size: small; font-family: Verdana, Geneva, sans-serif;">education technology consultant</span></p>
</div>        
<div id="menu">
        <strong><a href="index.htm" title="cv home">HOME</a>&nbsp;|&nbsp;<a href="contact.htm">CONTACT</a>&nbsp;|&nbsp;<a href="CVforPrint.htm">CV</a></strong> (<a href="edtechs.pdf">pdf</a>)</div>
  <div id="text">
<h4>Thanks</h4>
<p>I'll get back to you as soon as possible.</p>
</div>
<div id="footnote"><a title="Teaching" href="teaching.htm">Teaching</a>&nbsp;| <a title="my skills" href="skills.htm">Skills</a>&nbsp;| <a title="career history print media" href="printmediacv.htm">Print Media</a>&nbsp;| <a title="career history visual media" href="visualmediacv.htm">Visual Media</a>&nbsp;| <a title="qualifications and training" href="qualscv.htm">Qualifications and Training</a></div> 
 
</body>
</html>