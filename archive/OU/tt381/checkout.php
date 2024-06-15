<?php 
/*standard include for all action pages
*/
include("mh4468includes.php");
/*
we want to check that there is something to buy and send the
user back to go if there isn't.
*/

 	if (array_sum($_SESSION['cart']) <= 0)
  	{
			header("Location:cartaction.php");
//  		echo "Your Shopping Cart is empty: redirecting you back to the shopping cart <br />";		
  	}		
//I should put a catch in here to see if they've been returned from exit and if so
//display a message telling 'em to put in their credit card details ????? Not done.

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<META http-equiv=Content-Type content="text/html; charset=windows-1252">
<TITLE>Checkout and Order your selected Pans</TITLE>

</HEAD>
<BODY>
<H1>Your Order</H1>
<p>Your order will be processed and your pans posted to you within 2 weeks.</p>
<table summary="ordered products" border="1" cellpadding="4">
  <tr>
  <th>Pan Type
  </th>
  <th>Quantity
  </th>
  <th>Price<br />£
  </th>
  </tr>
	<?php buildorder(); ?>
</table>


<CENTER>
<P>
<HR>
Credit Card Details:
<FORM METHOD="POST" ACTION="exit.php">
<input type="text" name="cardnumber" size=13>
<?php /*echo "<span style=\"color:red;\">".$msg."</span>"; */?>
<select name="cardtype">
<option value="visa">visa</Option>
<option value="mastercard">mastercard</OPTION>
</select>
<INPUT TYPE="submit" NAME="submit" VALUE="Purchase Pans">
<input type="hidden" name="grandtotal" value="<?php echo $gtotal; ?>">
</FORM>
</CENTER>
<HR>

</BODY>
</HTML>
