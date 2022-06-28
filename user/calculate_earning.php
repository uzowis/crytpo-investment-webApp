<?php 

	  $sql3 = mysqli_query($db, "SELECT * FROM acct_details WHERE user_id='$id2'");
	  $result3 = mysqli_fetch_assoc($sql3);
	  $available_bal = $result3['available_bal'];
	  $currently_invested = $result3['currently_invested'];
	  $date = date('Y-m-d H:i:s');

			
			
			// Get investement date and convert to date format
			
			$sql_invest_date = mysqli_query($db, "SELECT * FROM investment WHERE user_id='$id2' AND status='Active'");
			$result_1 =mysqli_fetch_assoc($sql_invest_date);
			$plan= $result_1['plan'];
			$investment_date = $result_1['date'];
			$investment_date_converted = date_create($investment_date);
		
			
			
			// Retrieve End of investment date from DB and covert to date format.
			
			$end_of_investment = date('Y-m-d H:i:s');
			$end_of_investment_date_converted = date_create($end_of_investment);
			
			
			
			// process earnings
			
			 //Calculate Earnings
			$basic_earnings = (7/100)*$currently_invested;
			$sec_earnings = (10/100)*$currently_invested;
			$prof_earnings = (20/100)*$currently_invested;
			$spec_earnings = (50/100)*$currently_invested;
			
			
			
			
						
			
			//Get the Difference between Date of Investment and End of Investment Date
			
			$diff = date_diff($end_of_investment_date_converted, $investment_date_converted);
			$duration = $diff->format("%a");
			
			// Insert User Earnings into Earnings table and Update Investment and Acct_details tables where necessary
			if($duration >= 2 && $plan ==='Basic Plan' && $basic_earnings > 0){
				mysqli_query($db, "INSERT INTO earnings (user_id, type, date, amount) VALUES('$id2', 'RIO', '$investment_date', '$basic_earnings')");
				mysqli_query($db, "UPDATE investment SET status='Completed' WHERE user_id='$id2'");
				mysqli_query($db, "UPDATE acct_details SET available_bal= $currently_invested+$basic_earnings+$available_bal WHERE user_id='$id2'");
				mysqli_query($db, "UPDATE acct_details SET currently_invested=0 WHERE user_id='$id2'");
				
			}elseif($duration >= 3 && $plan ==='Secondary Plan'&& $sec_earnings > 0){
				mysqli_query($db, "INSERT INTO earnings (user_id, type, date, amount) VALUES('$id2', 'RIO', '$investment_date', '$sec_earnings')");
				mysqli_query($db, "UPDATE investment SET status='Completed' WHERE user_id='$id2'");
				mysqli_query($db, "UPDATE acct_details SET available_bal= $currently_invested+$sec_earnings+$available_bal WHERE user_id='$id2'");
				mysqli_query($db, "UPDATE acct_details SET currently_invested=0 WHERE user_id='$id2'");
				
			}elseif($duration >= 7 && $plan ==='Proffessional Plan' && $prof_earnings > 0){
				mysqli_query($db, "INSERT INTO earnings (user_id, type, date, amount) VALUES('$id2', 'RIO', '$investment_date', '$prof_earnings')");
				mysqli_query($db, "UPDATE investment SET status='Completed' WHERE user_id='$id2'");
				mysqli_query($db, "UPDATE acct_details SET available_bal= $currently_invested+$prof_earnings+$available_bal WHERE user_id='$id2'");
				mysqli_query($db, "UPDATE acct_details SET currently_invested=0 WHERE user_id='$id2'");
				
			}elseif($duration >= 15 && $plan ==='A.I Special Plan' && $spec_earnings > 0){
				mysqli_query($db, "INSERT INTO earnings (user_id, type, date, amount) VALUES('$id2', 'RIO', '$investment_date', '$spec_earnings')");
				mysqli_query($db, "UPDATE investment SET status='Completed' WHERE user_id='$id2'");
				mysqli_query($db, "UPDATE acct_details SET available_bal= $currently_invested+$spec_earnings+$available_bal WHERE user_id='$id2'");
				mysqli_query($db, "UPDATE acct_details SET currently_invested=0 WHERE user_id='$id2'");
				
			}
			
			
	        
				
			
			
?>		 
	  
	 