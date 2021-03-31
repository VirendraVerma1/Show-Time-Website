<?php
// this page will be called by the citymovie file this contains the movie id , city data was already stored in the city session , show all the blockbuster address of that perticular movie

session_start();
        include("db_con.php");
		
		if(isset($_GET['MovieID']))
		{
			$_SESSION['MovieID']=$_GET['MovieID'];
			$movieID=$_SESSION['MovieID'];
			//arranging sql query to getting best result
			$flag=false;
			$sqlpart="";
			if($_SESSION['Schedule1']==1)
			{
				$sqlpart+="Movie1ID='$movieID'";
				$flag=true;
			}
			
			if($_SESSION['Schedule2']==1)
			{
				if($flag==true){
				$sqlpart+=" or Movie2ID='$movieID'";
				}
				else{
				$sqlpart+="Movie2ID='$movieID'";
				}
				$flag=true;
			}
			
			if($_SESSION['Schedule3']==1)
			{
				if($flag==true)
				$sqlpart+=" or Movie3ID='$movieID'";
				else
				$sqlpart+="Movie3ID='$movieID'";
				$flag=true;
			}
			
			if($flag==false)
			$sql="Select * from BlockBuster where City='$_SESSION['City']'"
			else
			$sql="Select * from BlockBuster where City='$_SESSION['City']' and ('$sqlpart')";
            $run=mysqli_query($con,$sql);
            
            if($run>0)
            {
                while($data=mysqli_fetch_assoc($run))
                {
					
						//all the boxes should be shown for that perticular movie
						if($_SESSION['Schedule1']==1 && $data['Movie1ID']==$movieID)
						{
							//show box 1
						}
						
						if($_SESSION['Schedule2']==1 && $data['Movie1ID']==$movieID)
						{
							//show box 2
						}
					
						if($_SESSION['Schedule1']==1 && $data['Movie1ID']==$movieID)
						{
							//show box 3
						}
						
					//TODO show data blockbuster data on the webpage
                    echo $data['Name'];
					echo $data['Address'];
					
					
					
                }
            }
		}
	$con->close();
?>