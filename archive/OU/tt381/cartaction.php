<?php 
/*standard include for all action pages
*/
include("mh4468includes.php");
/*
The bulk of the page is built by looping through the cart
displaying required data.
Within the body of this page there are also calls to
addcart and remove cart functions - reflected in initial msg.
And a check to ensure that there is (and are items in) a shopping cart,
otherwise the empty shopping cart message is shown -
with possibility of executing checkout function removed.
*/
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<META http-equiv=Content-Type content="text/html; charset=windows-1252">
<TITLE>Your A&amp;B Pans shopping cart</TITLE>
</HEAD>
<BODY>
<?php
if (isset($_POST) && ($_POST[cartaction] == "add"))
{
	$item = $_POST[item];
	addtocart($item);
?>
<h3>Added to your shopping basket: <span style="color:red;"><?php echo $item ?></span> </h3>
</HEAD>
<?php
}
elseif (isset($_POST) && ($_POST[cartaction] == "remove"))
{
	$item = $_POST[item];
	removefromcart($item);
?>
<h3>Removed from your shopping basket: <span style="color:red;"><?php echo $item ?></span> </h3>

<?php	
}
else
{ 
	echo "Your Shopping Cart is empty";
}
?>


<h1>Your Shopping Cart</h1>

<TABLE>
<TR>
<?php 
if (!empty($_SESSION['cart']))
{
  foreach ($_SESSION['cart'] as $key=>$val)
  {
  	echo "<TD><IMG SRC=\"images/".$key.".jpg\" ALT=\"".$key."picture\"></TD>";
   ?>
  <TD>
  <BR>
  <?php 
  	echo "Quantity of ".$key." required: ".$val."</TD>";
  ?>
  <TD>
  <FORM METHOD="POST" ACTION="cartaction.php">
  <INPUT TYPE="submit" NAME="submit" VALUE="Add another">
  <input type="hidden" name="cartaction" value="add">
  <input type="hidden" name="item" value="<?php echo $key; ?>">
  </FORM>
  </TD>
  <TD>
  <FORM METHOD="POST" ACTION="cartaction.php">
  <INPUT TYPE="submit" NAME="submit" VALUE="Remove one">
  <input type="hidden" name="cartaction" value="remove">
  <input type="hidden" name="item" value="<?php echo $key; ?>">
  </FORM>
  </TD>
  </TR>
  <?php 
  }
//end foreach populating table
?>
</table>
<hr />
<CENTER>
<?php
 	if (array_sum($_SESSION['cart']) <= 0)
  	{
  		echo "Your Shopping Cart is empty <br />";
  	}
	else
	 	{
?>
<FORM  METHOD="POST" ACTION="checkout.php">
<INPUT TYPE="submit" NAME="submit" VALUE="Goto Checkout">
</FORM>
<?php
//end else to lose option to progress to checkout
	}
?>
<?php
//end if to lose option to progress to checkout
}
?>

<A HREF="index.php">Go Back Home</A>
<A HREF="copperrange.php">Copper Range</A>
<A HREF="steelrange.php">Steel Range</A>
</CENTER>
<HR>

</BODY>
</HTML>
