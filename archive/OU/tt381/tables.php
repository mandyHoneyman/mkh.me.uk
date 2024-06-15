<?

/**
	THE CODE IN THIS FILE CAN BE USED TO CREATE
	THE POPULATED STOCK TABLE AND EMPTY TRANSACTION
	TABLE IN A DATABASE.

	THE FILE CONTAINS A NUMBER OF FUNCTIONS
	AND THEN SCRIPTS WHICH USE THESE 
	FUNCTIONS TO CREATE THE STOCK TABLE
	AND THE TRANSACTION TABLE.
	
	To create and fill the stock table call:
		createStockTable()
	To delete the stock table call:
		deleteStockTable()
	To create the transaction tale call:
		createTransactionTable()
	To delete the trabsaction tablecall:
		deleteTransactionTable();

	At the start of this file are the global variables
	used to hold table names, database name, host, 
	database username ($id) and database password ($pwd).

	TO USE THIS CODE YOU MUST ADJUST THE CODE
	TO ADD THE TABLE TO YOUR OWN DATABASE USING
	YOUR OWN USERNAME AND PASSWORD.


**/


$transactiontablename = "transactions"; // transaction table name
$stocktablename = "pans";		// stock table name
$dbname = "madmkh_portfolios"; 			// CHANGE TO YOUR DB NAME.
$host = "mysql.thinkwebhosting.com"; 			// CHANGE IF USING A REMOTE HOST
$id = "madmkh_mkh"; 				// CHANGE TO YOUR DB USERNAME
$pwd = "faster"; 			// CHANGE TO YOUR DB PASSWORD


/**
	Function: Connect to a database.
	$host = hostname to connect to eg, 'localhost'
	$id = useername identity, eg 'ta589'
	$pwd = user password, eg 'twiggy9'
	Returns the database connection.
**/
function connect_db($host, $id, $pwd)
{
	$connection = @mysql_connect($host, $id, $pwd)
		or die(mysql_error());
	return $connection;
}

/**
	Function: Create a new empty table in a database.
	This function creates its own connection to the named
	database.
	$tablename = the name of the table to be created.
	$fields = an array of the names of fields (columns)
		  that the table will comprise.
	$types = an array of the types of the fields (as
	         listed in $fields). The array thus has the
		 same number of elements as '$fields'.
	$db = the name of the database in which to create 
	      the new table.
	$host, $id, $pwd (see function 'connect_db').
**/
function create_table($tablename, $fields, $types, $db, $host, $id, $pwd) 
{
	$connection = connect_db($host, $id, $pwd);
	$thisdb = @mysql_select_db($db, $connection)
		or die(mysql_error());
	$query = "CREATE TABLE $tablename (";
	for ($i=0; $i<count($fields); $i++)
	{
		$query .= "$fields[$i] $types[$i]";
		if ( $i < count($fields)-1 )
		{
			$query .= ", ";
		} 
	}
	$query .= ")";
	$result = mysql_query($query, $connection) 
		or die(mysql_error());
	return $result;
}

/**
	Function: adds a row to a given database table.
	$tablename = the name of the table to which the row is added.
	$fields, $values, $db, $host, $id, $pwd (see function create_table)
**/
function add_record($tablename, $fields, $values, $db, $host, $id, $pwd)
{
	$connection = connect_db($host, $id, $pwd);
	$thisdb = @mysql_select_db($db, $connection)
		or die(mysql_error());
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
	$result = mysql_query($query, $connection) 
		or die(mysql_error());
	return $result;
}
	

/**
	The following code is a sample set of calls
	to the above functions to create the intitial 
	stock table. 
	THE ITEMS YOU NEED TO CHANGE IN THIS CODE ARE
	LISTED WITH COMMENTS IN THE FUNCTION.	
**/
function createStockTable() {

	global $stocktablename;
	$fields = array("panname", "stock", "price");
	$types =  array("CHAR(20)", "SMALLINT", "SMALLINT");

	global $dbname;
	global $host;
	global $id;
	global $pwd;

	// create the empty table which is called 'pans'.
 	create_table($stocktablename, $fields, $types, $dbname, $host, $id, $pwd); 
	
	$pan1 = array("coppercasserole", '20', '2199');
	$pan2 = array("coppersaucepan",  '10', '1988');
	$pan3 = array("coppersaute",     '20', '1299');
	$pan4 = array("steelcasserole",  ' 8', '2099');
	$pan5 = array("steelfrying",     '22', '899');

	// add the pan information to the table.
	add_record($stocktablename, $fields, $pan1, $dbname, $host, $id, $pwd);
	add_record($stocktablename, $fields, $pan2, $dbname, $host, $id, $pwd);
	add_record($stocktablename, $fields, $pan3, $dbname, $host, $id, $pwd);
	add_record($stocktablename, $fields, $pan4, $dbname, $host, $id, $pwd);
	add_record($stocktablename, $fields, $pan5, $dbname, $host, $id, $pwd);
}



// this function can be used to delete the stock table.
function deleteStockTable() {

	global $stocktablename;
	global $dbname;
	global $host;
	global $id;
	global $pwd;
	$connection = connect_db($host, $id, $pwd);
	$thisdb = @mysql_select_db($dbname, $connection)
		or die(mysql_error());
	$query = "DROP TABLE $stocktablename";
	$result = mysql_query($query, $connection) 
		or die(mysql_error());
	return $result;	
}

// this function can be used to create the empty transaction table.
function createTransactionTable() {

	global $transactiontablename;
	$fields = array("cardnumber", "totalcost");
	$types =  array("CHAR(20)", "SMALLINT");

	global $dbname;
	global $host;
	global $id;
	global $pwd;

	// create the empty table which is called 'pans'.
 	create_table($transactiontablename, $fields, $types, $dbname, $host, $id, $pwd); 
}
	


// this function can be used to delete the transaction table.
function deleteTransactionTable() {

	global $transactiontablename;
	global $dbname;
	global $host;
	global $id;
	global $pwd;
	$connection = connect_db($host, $id, $pwd);
	$thisdb = @mysql_select_db($dbname, $connection)
		or die(mysql_error());
	$query = "DROP TABLE $transactiontablename";
	$result = mysql_query($query, $connection) 
		or die(mysql_error());
	return $result;	
}

// sample calls:
// createStockTable();
// deleteStockTable();
// createTransactionTable();
// deleteTransactionTable();

?>