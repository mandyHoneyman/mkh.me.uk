<?php
/***********************
TT381 ECA page initialise sequences and functions 

title: mh4468includes.php
author: Mandy Honeyman 
OUUI: mh4468 
OUPI: M3160730
date: December 2004

purpose: storage file for functions
intention: to include this file in all pages (except index).

************************/
/*start the session and because it is here at the top of the includes file which is called at
the top of each page, we know it's always there!
*/
session_start();
//this header call stops back button from adding postdata, but doesn't do anything for refresh.
header("Cache-control: private");

//Variables in use throughout - mkh note - unsuccessfully tried to set these up as constants.
$transactiontablename = "transactions"; // transaction table name
$stocktablename = "pans";		// stock table name
$dbname = "madmkh_portfolios"; 			// database name
$host = "mysql.thinkwebhosting.com"; 			// host name
$id = "madmkh_mkh"; 			// mkh - REMEMBER to change this before uploading
$pwd = "faster"; 			//  mkh - REMEMBER to change this before uploading



/*
functions: addtocart and removefromcart
set up and use the session array into which we save shopping cart information for
adding and removing items selected by the user.
*/
function addtocart($item)
{
	if (empty($_SESSION['cart']))
	{
		$_SESSION['cart'] = array();
		$_SESSION['cart'][$item] = 1;
	}
	else
	{ 
   $_SESSION['cart'][$item]++;
	}
}
function removefromcart($item)
{
   $_SESSION['cart'][$item]--;
}

//Start 1st lift. Taken (though changed) from tables.php supplied by CT


/**
	Function: Connect to a database.
	$host = hostname to connect to eg, 'localhost'
	$id = useername identity, eg 'ta589'
	$pwd = user password, eg 'twiggy9'
	Returns the database connection.
**/
function connect_db($host, $id, $pwd)
{
	$connection = @mysql_connect($host, $id, $pwd) or die(mysql_error());
	return $connection;
}
//end first lift.
/**
	Function: add_record
	adds a row to a given database table.
	$tablename = the name of the table to which the row is added.
	$fields, $values are arrays. 
	NB fields removed from script, though still passed ,because of repeated 
	sql error and the fact they weren't actually required.
**/
function add_record($tablename, $fields, $values)
{
	global $stocktablename;
	global $transactiontablename;
	global $dbname;
	global $host;
	global $id;
	global $pwd;
	
	$connection = @mysql_connect($host, $id, $pwd) or die(mysql_error());
	$thisdb = @mysql_select_db($dbname, $connection) or die(mysql_error());
	$query = "INSERT INTO $tablename VALUES(";
  	for ($i=0; $i<count($values); $i++)
  	{
  		$query .= "'$values[$i]'";
  		if ( $i < count($values)-1 )
  		{
  			$query .= ", ";
  		} 
  	}
  	$query .= ")";
	$result = mysql_query($query, $connection) or die(mysql_error());
	return $result;
}


/** Function: get the price of pot or pan
	$item: the item we are looking for.
	For a larger application it would be better if the table
	included id's and were normalised according to ranges of items. 
	It is necessary to call this function repeatedly
	in order to populate the price in the html page. This doesn't seem
	very efficient. If the tables were arranged differently it would be possible
	to read the table into an array here and pop out the results without
	reconnecting to the database.
	On second thoughts could perhaps be done by doing check for copper and steel strings
	within array (not done).
**/

function getprice($tablename, $item) 
{
	$connection = @mysql_connect($host, $id, $pwd) or die(mysql_error());
	global $dbname;
	$thisdb = @mysql_select_db($dbname, $connection) or die(mysql_error());
	//set up query
	$query = "SELECT price FROM ".$tablename." WHERE panname = '".$item."'";
  $result = mysql_query($query, $connection) or die(mysql_error());
	//extract query from the resulting array
	$row = mysql_fetch_array($result);
	//convert the result into a float
	$intresult = $row['price'];
	$result = $intresult / 100;
	return $result;
}
/*
function: buildorder
create table output for checkout page from session cart
including working out postage & packing
outputs totals
and returns grand total for use elsewhere.
*/
function buildorder()
{
	global $stocktablename;
	global $gtotal;
  if (!empty($_SESSION['cart']))
  {
    foreach ($_SESSION['cart'] as $key=>$val)
		{
  		$qtotal = getprice($stocktablename,$key)*$val;
  		$total += $qtotal;
  		$qpandp += $val; 
      	echo "<tr>\n";
      	echo "<TD>".$key."</TD>\n";
  			echo "<TD>".$val."</TD>\n";
  			echo "<td>".$qtotal."</td>";
  			echo "</tr>\n";
		}
		$qpandptotal = (($qpandp-1) * 2.00) + 3.50;
		$gtotal = $qpandptotal + $total;
		echo "<tr><td colspan=\"2\">Postage &amp; Packing</td><td>".$qpandptotal."</td></tr>";
		echo "<tr><td colspan=\"2\"><strong>Total</strong></td><td>".$gtotal."</td></tr>";
	}
	return $gtotal;
}
/*
function: buildexit
Finally stores the order to the database and updates stock levels
checks (again) for an existing cart
*/
function buildexit()
{
	global $stocktablename;
	global $transactiontablename;
	global $gtotal;
	global $dbname;
	global $host;
	global $id;
	global $pwd;
	
  if (!empty($_SESSION['cart']))
  {
  	$connection = @mysql_connect($host, $id, $pwd) or die(mysql_error());
    $thisdb = @mysql_select_db($dbname, $connection) or die(mysql_error());
		//update the stock levels
    foreach ($_SESSION['cart'] as $key=>$val)
		{
      //set up query
      $query = "UPDATE ".$stocktablename." SET stock=stock-".$val." WHERE panname = '".$key."'";
      $result = mysql_query($query, $connection) or die(mysql_error());
		}
		//now build the transaction record
		$cardnumber = trim($_POST[cardnumber]);
		//get grandtotal back to an integer for storage
		$grandtotal = ($_POST[grandtotal]*100);
		$fields= array("cardnumber","transaction");
		$values= array("$cardnumber","$grandtotal");
		add_record($transactiontablename,$fields,$values);
		
	}
	//clear up after ourselves clearing the cart and destroying the session.
	unset($_SESSION['cart']);
	session_destroy();
	return;
}

/*
function: buildtrans
Builds the table for the transaction page.
Select all the records from the transaction table, save into an array and output them here.
*/
function buildtrans()
{
	global $transactiontablename;
	global $dbname;
	global $host;
	global $id;
	global $pwd;
	
  $connection = @mysql_connect($host, $id, $pwd) or die(mysql_error());
  $thisdb = @mysql_select_db($dbname, $connection) or die(mysql_error());
	$query = "SELECT * FROM $transactiontablename";
	$result = @mysql_query($query,$connection) or die(mysql_error());
	while ($row = mysql_fetch_array($result))
	{
		$card = $row['cardnumber'];
		$total = $row['totalcost'] / 100;
		
      	echo "<tr>\n";
      	echo "<TD>".$card."</TD>\n";
  			echo "<TD>".$total."</TD>\n";
  			echo "</tr>\n";
	}	
	return;
}

?>