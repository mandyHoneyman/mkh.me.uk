<?php 
/*standard include for all action pages
*/
include("mh4468includes.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<META http-equiv=Content-Type content="text/html; charset=windows-1252">
<TITLE>Transactions Summary</TITLE>
</HEAD>
<BODY>
<H1>Transactions</H1>

<table summary="current transactions" border="1" cellpadding="4">
  <tr>
  <th>Card Number
  </th>
  <th>Total Cost<br />
	&pound;
  </th>
  </tr>
	<?php buildtrans(); ?>
</table>
</body>
</html>


</BODY>
</HTML>
