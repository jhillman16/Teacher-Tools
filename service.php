<?php
 
// Server in the this format: <computer>\<instance name> or 
// <server>,<port> when using a non default port number
$server = 'DESKTOP-UVO497A\SQLEXPRESS';

// Connect to MSSQL
$link = mssql_connect($server, 'GoldenWolf', 'Cave27Ace4!');

if (!$link) {
    die('Something went wrong while connecting to MSSQL');
}
else
{
	die('We did it');
?>