<?php
// this page will be called by the blockbuster file this contains the myschedule data, initializing and arranging slots for user_error
//updation on blockbuster table

session_start();
    include("db_con.php");
		
	if(isset($_GET['MySchedule'])||isset($_SESSION['MySchedule']))//assume that blockbuster id and schedule was already stored
	{
                if(isset($_GET['MySchedule'])){
                $_SESSION['MySchedule']=$_GET['MySchedule'];
                $_SESSION['SeatOccupied']=0;
                $_SESSION['MySeat']="";
                
                }
                else
                $_GET['MySchedule']=$_SESSION['MySchedule'];
		//0 means today //1 means tommorow //2 means day after tommorow
		$slotarray0=array();
		$slotarray1=array();
		$slotarray2=array();
		
		//getting values from sessions
		$str = $_GET['MySchedule'];
		$a=explode("_",$str);
                
		$blockbusterid=$a[0];
		$scheduleid=$a[1];
		
		
		//fetching values from the database
		$schedulename="";
		if($scheduleid==1)$schedulename="Slots1Booking";
		else if($scheduleid==2)$schedulename="Slots2Booking";
		else if($scheduleid==3)$schedulename="Slots3Booking";
		
		$sql="Select $schedulename from BlockBuster where ID='$blockbusterid'";
        $run=mysqli_query($con,$sql);
                
        if($run>0)
        {
            $data=mysqli_fetch_assoc($run);
                    
			if($data[$schedulename]=="" || $data[$schedulename]==null ||$data[$schedulename]==" ")
			{
                        
				// initialize the array
				//first day
				$st="";
				for($i=0;$i<20;$i++)
				{
					if($i<19)
					$st.="0;";
					else
					$st.="0";
					
					array_push($slotarray0,"0");
				}
				$st.="|";
				
				//second day
				for($i=0;$i<20;$i++)
				{
					if($i<19)
					$st.="0;";
					else
					$st.="0";
					
					array_push($slotarray1,"0");
				}
				$st.="|";
				
				//third day
				for($i=0;$i<20;$i++)
				{
					if($i<19)
					$st.="0;";
					else
					$st.="0";
					
					array_push($slotarray2,"0");
				}
                                
				
			}
			else
			{
				//explode
				$slotstring=explode(":",$data[$schedulename]);
				$slotarray0=explode(",",$slotstring[0]);
				$slotarray1=explode(",",$slotstring[1]);
				$slotarray2=explode(",",$slotstring[2]);
			}
			
			
			
			
			//now show value to the user if 1 then occupied
			//pass slot index value
        }else{
        echo $sql;
        }
		
	}
        
        
        
	$ismaxseat=0;
        $myseat=array();
	if(isset($_GET['SlotIndex']))
	{
                if($_SESSION['SeatOccupied']>5)
                $ismaxseat=1;
                
                if($_SESSION['MySeat']!=null||$_SESSION['MySeat']!="")
                {
                    $my=explode(",",$_SESSION['MySeat']); 
                        for($i=0;$i<count($my);$i++)
                        {
                                if($my[$i]>-1)
                                array_push($myseat,$my[$i]);
                        }
                }
                
                
                
                
                
		$slotindex=$_GET['SlotIndex'];
                if($scheduleid==1)
		{
			if($slotarray0[$slotindex]==0&&$_SESSION['SeatOccupied']<5)
			{
				$temp=$_SESSION['SeatOccupied'];
				$_SESSION['SeatOccupied']=($temp+1);
				$slotarray0[$slotindex]=1;
                                array_push($myseat,$slotindex);
			}else{
                                $f=-1;
                                for($i=0;$i<count($myseat);$i++)
                                {
                                        if($myseat[$i]==$slotindex)
                                        {
                                                $f=$i;
                                        }
                                }
                                if($f>=0){
                                $temp=$_SESSION['SeatOccupied'];
				$_SESSION['SeatOccupied']=($temp-1);
				$slotarray0[$slotindex]=0;
                                
                                
                                $myseat[$f]=-1;
                                  
                                
                                }
                        }
		}
		
		if($scheduleid==2)
		{
			if($slotarray1[$slotindex]==0 && $_SESSION['SeatOccupied']<5)
			{
				$temp=$_SESSION['SeatOccupied'];
				$_SESSION['SeatOccupied']=($temp+1);
				$slotarray1[$slotindex]=1;
                                array_push($myseat,$slotindex);
			}else {
                                $f=-1;
                                for($i=0;$i<count($myseat);$i++)
                                {
                                        if($myseat[$i]==$slotindex)
                                        {
                                                $f=$i;
                                        }
                                }
                                if($f>=0){
                                $temp=$_SESSION['SeatOccupied'];
				$_SESSION['SeatOccupied']=($temp-1);
				$slotarray1[$slotindex]=0;
                                
                                $myseat[$f]=-1;
                                                                
                                }
                        }
		}
		
		if($scheduleid==3)
		{
			if($slotarray2[$slotindex]==0 && $_SESSION['SeatOccupied']<5)
			{
				$temp=$_SESSION['SeatOccupied'];
				$_SESSION['SeatOccupied']=($temp+1);
				$slotarray2[$slotindex]=1;
                                array_push($myseat,$slotindex);
			}else{
                                $f=-1;
                                for($i=0;$i<count($myseat);$i++)
                                {
                                        if($myseat[$i]==$slotindex)
                                        {
                                                $f=$i;
                                        }
                                }
                                if($f>=0){
                                $temp=$_SESSION['SeatOccupied'];
				$_SESSION['SeatOccupied']=($temp-1);
				$slotarray2[$slotindex]=0;
                                
                                $myseat[$f]=-1;
                                
                                }
                        }
		}
                
		
                //encode for session booked seat
                $st="";
                for($i=0;$i<count($myseat);$i++)
                {
                        if($myseat[$i]!=-1)
                        $st.=$myseat[$i].",";  
                        
                }
                $_SESSION['MySeat']=$st;
                
               // echo "<br>".$_SESSION['MySeat']."<br>";
                for($i=0;$i<count($myseat);$i++)
                        {
                               // echo $myseat[$i]."<br>";
                        }
		
		//encode and update to database and again refresh the page
				//first day
				$st="";
				for($i=0;$i<count($slotarray0);$i++)
				{
					if($i<19)
					$st.=$slotarray0[$i].",";
					else
					$st.=$slotarray0[$i];
					
				}
				$st.=":";
				
				//second day
				for($i=0;$i<count($slotarray1);$i++)
				{
					if($i<19)
					$st.=$slotarray1[$i].",";
					else
					$st.=$slotarray1[$i];
					
				}
				$st.=":";
				
				//third day
				for($i=0;$i<count($slotarray2);$i++)
				{
					if($i<19)
					$st.=$slotarray2[$i].",";
					else
					$st.=$slotarray2[$i];
					
				}
				
				//update to database
				$sql="UPDATE BlockBuster SET $schedulename = '$st' WHERE ID = '$blockbusterid'";
				$run=mysqli_query($con,$sql);
                                
				if($run)
				{
				  //echo "sucess";
				}else{
				  echo $con -> error;
                                  echo $sql;
				}
				
	}
	$con->close(); 
?>

<!DOCTYPE html>
<html>
<title>Book Seat</title>
<style>
#red{
  background-color: #f44336;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}
#red {
  background-color: red;
}

#green{
  background-color: #f44336;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}
#green {
  background-color: green;
}
#grey{
  background-color: #f44336;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}
#grey {
  background-color: grey;
}

#save{
  background-color: #f44336;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}
#save {
  background-color: blue;
}
</style>
<body>

<h1 align="center">Book Your Seat</h1>
<h3 align="center"> <?php echo $_SESSION['SeatOccupied']."/5"; ?></h3>
<table align="center" cellpadding=30>
	<tr>
                <?php
                        $counter=-1;
                        
                        for($i=0;$i<count($slotarray0);$i++)
                        {
                                
                                $counter++;
                                                $mseat=false;
                                                for($j=0;$j<count($myseat);$j++){
                                                        if($myseat[$j]==$i&&$slotarray0[$i]==0)
                                                        {
                                                                //got my seat
                                                                $mseat=true;
                                                        }else if($myseat[$j]==$i){
                                                                echo "Test".$slotarray0[$i];
                                                        }
                                                }
                                if($counter<5){
                                                
                                        if($scheduleid==1)
                                        {
                                                
                                                $sr="bookseat.php?SlotIndex=".$i;
                                                if($slotarray0[$i]==0)
                                                echo '<td><a id="green" href='.$sr.'>'.($i+1).'</a></td>';
                                                else if($mseat==true)
                                                echo '<td><a id="red" href='.$sr.'>'.($i+1).'</a></td>';
                                                else
                                                echo '<td><a id="grey" href='.$sr.'>'.($i+1).'</a></td>';
                                                
                                        }
                                        if($scheduleid==2)
                                        {
                                                $sr="bookseat.php?SlotIndex=".$i;
                                                if($slotarray1[$i]==0)
                                                echo '<td><a id="green" href='.$sr.'>'.($i+1).'</a></td>';
                                                else if($mseat==true)
                                                echo '<td><a id="red" href='.$sr.'>'.($i+1).'</a></td>';
                                                else
                                                echo '<td><a id="grey" href='.$sr.'>'.($i+1).'</a></td>';
                                        }
                                        if($scheduleid==3)
                                        {
                                                $sr="bookseat.php?SlotIndex=".$i;
                                                if($slotarray2[$i]==0)
                                                echo '<td><a id="green" href='.$sr.'>'.($i+1).'</a></td>';
                                                else if($mseat==true)
                                                echo '<td><a id="red" href='.$sr.'>'.($i+1).'</a></td>';
                                                else
                                                echo '<td><a id="grey" href='.$sr.'>'.($i+1).'</a></td>';
                                        }
                                }else{
                                        echo '</tr>
                                        <tr>';$counter=0;
                                        if($scheduleid==1)
                                        {
                                                $sr="bookseat.php?SlotIndex=".$i;
                                                if($slotarray0[$i]==0)
                                                echo '<td><a id="green" href='.$sr.'>'.($i+1).'</a></td>';
                                                else if($mseat==true)
                                                echo '<td><a id="red" href='.$sr.'>'.($i+1).'</a></td>';
                                                else
                                                echo '<td><a id="grey" href='.$sr.'>'.($i+1).'</a></td>';
                                        }
                                        if($scheduleid==2)
                                        {
                                                $sr="bookseat.php?SlotIndex=".$i;
                                                if($slotarray1[$i]==0)
                                                echo '<td><a id="green" href='.$sr.'>'.($i+1).'</a></td>';
                                                else if($mseat==true)
                                                echo '<td><a id="red" href='.$sr.'>'.($i+1).'</a></td>';
                                                else
                                                echo '<td><a id="grey" href='.$sr.'>'.($i+1).'</a></td>';
                                        }
                                        if($scheduleid==3)
                                        {
                                                $sr="bookseat.php?SlotIndex=".$i;
                                                if($slotarray2[$i]==0)
                                                echo '<td><a id="green" href='.$sr.'>'.($i+1).'</a></td>';
                                                else if($mseat==true)
                                                echo '<td><a id="red" href='.$sr.'>'.($i+1).'</a></td>';
                                                else
                                                echo '<td><a id="grey" href='.$sr.'>'.($i+1).'</a></td>';
                                        }
                                }
                        }
                ?>
		
	</tr>
	
</table>
<br><br>
<div align="center">
<a  id="save" href="bookshow.php">Save</a>
</div>
</body>
</html>