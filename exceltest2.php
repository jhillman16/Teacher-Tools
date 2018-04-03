<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once 'excel_reader2.php';
include("ConnectDatabase.php"); //Goes through steps of connecting to database
session_start();


$data = new Spreadsheet_Excel_Reader("test1.xls", false);


$row = 1;
$column = 1;
$end = FALSE;
$count = 0;
$QuestionIDNum = 0;

while(!$end)
{	
	while($data->val($row, $column) != ',')
	{
		if($column == 1)
		{
			$questionQuery = "INSERT INTO Question (Question, QuizID, QuestionID, Points) 
            VALUES ($data->val($row, $column), '999', '$QuestionIDNum', '$data->val($row, $column + 1')";
			mysqli_query($link, $questionQuery);

		}
		else
		{
			/*
			if(strpos($data->val($row, $column), '~')
			 {
				   
			 }
			 */
		}
			
		
		echo $data->val($row, $column);
		$column++;
		if($data->val($row, $column) == ';')
		{
			   $end = TRUE;
			   break;
		}
	}
	$row++;	
	$column = 1;
	$QuestionIDNum++;
	
}



?>
