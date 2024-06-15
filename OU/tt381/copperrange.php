<?php 
/*standard include for all action pages
*/
include("mh4468includes.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<META http-equiv=Content-Type content="text/html; charset=windows-1252">
<TITLE>Copper Range of Pans</TITLE>
</HEAD>
<BODY>

<H1>Copper Range of Pans</H1>

<TABLE>
<TR><TD>
<IMG SRC="images/coppercasserole.jpg" ALT="copper casserole pan">
</TD>
<TD>
Copper Casserole pan<BR>
Capacity 4 litres<BR>
<?php
$coppercasseroleprice = getprice("pans","coppercasserole"); 
echo "Price: £".$coppercasseroleprice;
?>
<BR>
</TD>
<TD>
<FORM METHOD="POST" ACTION="cartaction.php">
<INPUT TYPE="submit" NAME="submit" VALUE="Buy">
<input type="hidden" name="cartaction" value="add">
<input type="hidden" name="item" value="coppercasserole">
</FORM>
</TD>
</TR>

<TR>
<TD>
<IMG SRC="images/coppersaucepan.jpg" ALT="copper sauce pan">
</TD>
<TD>
Copper Saucepan 10"<BR>
<?php
$coppersaucepanprice = getprice("pans","coppersaucepan"); 
echo "Price: £".$coppersaucepanprice;
?><BR>
</TD>
<TD>
<FORM METHOD="POST" ACTION="cartaction.php">
<INPUT TYPE="submit" NAME="submit" VALUE="Buy">
<input type="hidden" name="cartaction" value="add">
<input type="hidden" name="item" value="coppersaucepan">
</FORM>
</TD>
</TR>

<TR>
<TD>
<IMG SRC="images/coppersaute.jpg" ALT="copper saute">
</TD>
<TD>
Copper Saute Pan 11"<BR>
<?php
$coppersauteprice = getprice("pans","coppersaute"); 
echo "Price: £".$coppersauteprice;
?><BR>
</TD>
<TD>
<FORM METHOD="POST" ACTION="cartaction.php">
<INPUT TYPE="submit" NAME="submit" VALUE="Buy">
<input type="hidden" name="cartaction" value="add">
<input type="hidden" name="item" value="coppersaute">
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
