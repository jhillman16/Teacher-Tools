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

while(!$end)
{	
	while($data->val($row, $column) != ',')
	{
		if($column == 1)
		{
			$questionQuery = "INSERT INTO Question (Question, QuizID, QuestionID, Points) 
            VALUES ('$Question', '$CurrentQuizID', '$QuestionIDNum', '$points')";
			
			if(mysqli_query($link, $questionQuery))
			{
   			     echo "Records added successfully " . $_SESSION['QuestionNum'] . ".";	
			}
			else
			{
			     echo "ERROR: Not able to execute $sql. " . mysqli_error($link);
			}

		}
		else
		{
			if(strpos($data->val($row, $column), '~')
			 {
				   
			 }
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
	$count++;
	
}



?>
