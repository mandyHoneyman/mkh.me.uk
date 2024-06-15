<?php 
/*standard top for all action pages captures all the functions
and ensures a session is available
*/
include("mh4468includes.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<META http-equiv=Content-Type content="text/html; charset=windows-1252">
<TITLE>Lightweight Steel Range</TITLE>

</HEAD>
<BODY>

<H1>Lightweight Steel Range</H1>

<TABLE>
<TR><TD>
<IMG SRC="images/steelcasserole.jpg" ALT="steel casserole">
</TD>
<TD>
Steel Casserole pan<BR>
Capacity 3 litres<BR>
<?php
$steelcassprice = getprice("pans","steelcasserole"); 
echo "Price: £".$steelcassprice;
?>
</TD>
<TD>
<FORM METHOD="POST" ACTION="cartaction.php">
<INPUT TYPE="submit" NAME="submit" VALUE="Buy">
<input type="hidden" name="cartaction" value="add">
<input type="hidden" name="item" value="steelcasserole">
</FORM>

</TD>
</TR>
<TR>
<TD>
<IMG SRC="images/steelfrying.jpg" ALT="steel frying pan">
</TD>
<TD>
Small 12" Frying Pan<BR>
<?php
$steelfrying = getprice("pans","steelfrying"); 
echo "Price: £".$steelfrying;
?>

</TD>
<TD>
<FORM METHOD="POST" ACTION="cartaction.php">
<INPUT TYPE="submit" NAME="submit" VALUE="Buy">
<input type="hidden" name="cartaction" value="add">
<input type="hidden" name="item" value="steelfrying">
</FORM>

</TD>
</TR>
</TABLE>
<P>

<HR>

<FORM METHOD="POST" ACTION="cartaction.php">
<INPUT TYPE="submit" NAME="submit" VALUE="Show Cart or Checkout">
<input type="hidden" name="cartaction" value="display">
</FORM>

<CENTER>
<A HREF="index.php">Go Back Home</A>
</CENTER>
<HR>
</BODY>
</HTML>
