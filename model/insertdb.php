<?php

require_once('../model/database.php');

if(isset($_POST)) // runs when add review button is clicked
	{
		
		//store what we get from html fields into variables below
		$id = $_POST['id'];
		$name = $_POST['name'];
		$last = $_POST['last'];
		$lowestAsk = $_POST['lowestAsk'];
		$highestBid = $_POST['highestBid'];
		$percentChange = $_POST['percentChange'];
		$baseVolume = $_POST['baseVolume'];
		$quoteVolume = $_POST['quoteVolume'];
		$high24hr = $_POST['high24hr'];
		$low24hr = $_POST['low24hr'];
	
		

		//Validation in client side is not enough here we need to valite them again on server side.
		if(!empty($id) && !empty($name) && !empty($last) &&
		 !empty($lowestAsk) && !empty($highestBid) && !empty($percentChange) && !empty($baseVolume)
		  && !empty($quoteVolume) && !empty($high24hr) && !empty($low24hr)) //start1
		{
			
				
			try
			{
			// Connect to our database
			
			$dbc = Database::connect();
			//set up error mode, set to exception
			$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			//prepare the query
			$sql = $dbc->prepare("INSERT INTO  coin_ticker(id,
														name, 
														last,
														lowestAsk,
														highestBid,
														percentChange,
														baseVolume,
														quoteVolume,
														high24hr,
														low24hr)
			VALUES (:id, :name, :last, :lowestAsk, :highestBid, :percentChange, 
			:baseVolume, :quoteVolume, :high24hr, :low24hr)");

			//bind parameters
			$sql->bindParam(':id', $id, PDO::PARAM_INT);
			$sql->bindParam(':name', $name, PDO::PARAM_STR, 15);
			$sql->bindParam(':last', $last, PDO::PARAM_STR, 30);
			$sql->bindParam(':lowestAsk', $lowestAsk, PDO::PARAM_STR, 30);
			$sql->bindParam(':highestBid', $highestBid, PDO::PARAM_STR, 30);
			$sql->bindParam(':percentChange', $percentChange, PDO::PARAM_STR, 30);
			$sql->bindParam(':baseVolume', $baseVolume, PDO::PARAM_STR, 30);
			$sql->bindParam(':quoteVolume', $quoteVolume,PDO::PARAM_STR, 30);
			$sql->bindParam(':high24hr', $high24hr,PDO::PARAM_STR, 30);
			$sql->bindParam(':low24hr', $low24hr,PDO::PARAM_STR, 30);
			
			//execute the query
			$sql->execute();
			
			
			echo 'Success!';
		   
			
			
			//dispose of variables
			$id = "";
			$name = "";
			$last = "";
			$lowestAsk = "";
			$higestBid = "";
			$percentChange = "";
			$baseVolume = "";
			$quoteVolume = "";
			$high24hr = "";
			$low24hr = "";
			

			}

			catch(PDOException $e) 
			{
				echo "Error:". $e->getMessage();
			}

			Database::disconnect(); // close connection

		}		
				
			   
		
		else
		{
			echo 'Error: some variables are empty';		 
			   
		}          
	}     


	?>

?>

