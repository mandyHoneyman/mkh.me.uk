<?php 
/*standard include for all action pages
*/
include("mh4468includes.php");
/*first catch credit card validation
Make sure we have credit card details before continuing
if not user is dumped back at the checkout page.
Otherwise we call the buildexit function.
*/
if (empty($_POST[cardnumber]))
{
  header("Location:checkout.php");
}
else
{
	buildexit();
	$total = $_POST[grandtotal];
	$cardtype = $_POST[cardtype];
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<META http-equiv=Content-Type content="text/html; charset=windows-1252">
<TITLE>Checkout and Order your selected Pans</TITLE>

</HEAD>
<BODY>
<H1>Your Order</H1>

Thank you for purchasing your pans.
The sum of £<?php echo $total; ?> will be debited from your <?php echo $cardtype; ?> card. 

<CENTER>
<A HREF="index.php">Go Back Home</A>
</CENTER>
<HR>

</BODY>
</HTML>
