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
                                $sqlpart.="Movie1ID='$movieID'";
				$flag=true;
			}
			
			if($_SESSION['Schedule2']==1)
			{
				if($flag==true){
				$sqlpart.=" or Movie2ID='$movieID'";
				}
				else{
				$sqlpart.="Movie2ID='$movieID'";
				}
				$flag=true;
			}
			
			if($_SESSION['Schedule3']==1)
			{
				if($flag==true)
				$sqlpart.=" or Movie3ID='$movieID'";
				else
				$sqlpart.="Movie3ID='$movieID'";
				$flag=true;
			}
                        $city=$_SESSION['City'];
			
			if($flag==false)
			$sql="Select * from BlockBuster where City='$city'";
			else
			$sql="Select * from BlockBuster where City='$city' and ($sqlpart)";
            $run=mysqli_query($con,$sql);
            
            
?>
<!DOCTYPE html>
<html>
<title>Multiplex Selection</title>

<body>

<table>
	<td>
		<?php
                        $movieSql="Select * from MovieBlock where id='$movieID'";
                        $runmovie=mysqli_query($con,$movieSql);
                        if($runmovie>0)
                        {
                                $data=mysqli_fetch_assoc($runmovie);
                                echo '<img src='.$data['MovieImageLink'].' width=135 height = 200>';
                                 
                        }
                        
                ?>
		
	</td>
	<td align="top">
                <?php
                        $movieSql="Select * from MovieBlock where id='$movieID'";
                        $runmovie=mysqli_query($con,$movieSql);
                        if($runmovie>0)
                        {
                                $data=mysqli_fetch_assoc($runmovie);
                                echo $data['Name']."<br>";
                                echo $data['Rating']."<br>";
                                echo $data['Language']."<br>";
                                
                        }
                        
                ?>
		
	</td>
</table>
	
<table cellpadding=5 cellspacing=30>

        <?php
        
                if($run>0)
                    {
                        while($data=mysqli_fetch_assoc($run))
                        {
                                        $slotid=0;
                                                        //all the boxes should be shown for that perticular movie
                                                        if($_SESSION['Schedule1']==1 && $data['Movie1ID']==$movieID)
                                                        {
                                                                $slotid=1;
                                                        }
                                                        
                                                        if($_SESSION['Schedule2']==1 && $data['Movie2ID']==$movieID)
                                                        {
                                                                $slotid=2;
                                                        }
                                                
                                                        if($_SESSION['Schedule1']==1 && $data['Movie3ID']==$movieID)
                                                        {
                                                                $slotid=3;
                                                        }
                                                        
                                                //TODO show data blockbuster data on the webpage
                            
                                    echo '<tr >
                                                <td><h3> '.$data['Name'].' : '.$data['Address'].'</h3></td>
                                                ';
                                    $sr="bookseat.php?MySchedule=".$data['ID']."_".$slotid;
                                    if($_SESSION['Schedule1']==1 && $data['Movie1ID']==$movieID)
                                    {
                                            
                                           echo '<td><a href='.$sr.' align="center"> Morning <br> 9:00-11:00</a></td>';
                                    }
                                       
                                    if($_SESSION['Schedule2']==1 && $data['Movie2ID']==$movieID)
                                    {
                                           echo '<td><a href='.$sr.' align="center"> Afternoon <br> 12:00-2:00</a></td>';
                                    }
                                                
                                    if($_SESSION['Schedule1']==1 && $data['Movie3ID']==$movieID)
                                    {
                                           echo '<td><a href='.$sr.' align="center"> Evening <br> 3:00-5:00</a></td>';
                                    }
                                    
                                    echo '</tr>
                                        <br><br><br>';            
                                                
                                                
                        }
                    }else{
                            echo $sql;
                    }
        
        ?>
	
	</table>

</body>
</html>


<?php
}
	$con->close();
?>
