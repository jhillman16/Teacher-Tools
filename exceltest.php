<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once 'excel_reader2.php';
include("ConnectDatabase.php"); //Goes through steps of connecting to database
session_start();

$data = new Spreadsheet_Excel_Reader("test1.xls", false);


$row = 1;
$column = 1;

while($data->val($row, $column) != ';')
{	
	while($data->val($row, $column) != ',')
	{
		echo $data->val($row, $column);
		$column++;
	}
	$row++;	
	$column = 1;
	
}



?>
