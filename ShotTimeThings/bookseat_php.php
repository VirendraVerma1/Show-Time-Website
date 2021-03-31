<?php
// this page will be called by the blockbuster file this contains the myschedule data, initializing and arranging slots for user_error
//updation on blockbuster table

session_start();
    include("db_con.php");
		
	if(isset($_SESSION['MySchedule']))//assume that blockbuster id and schedule was already stored
	{
		//0 means today //1 means tommorow //2 means day after tommorow
		$slotarray0=array();
		$slotarray1=array();
		$slotarray2=array();
		
		//getting values from sessions
		$str = $_SESSION['MySchedule'];
		$a=explode("_",$str);
		$blockbusterid=$a[0];
		$scheduleid=$a[1];
		
		
		//fetching values from the database
		$schedulename="";
		if($scheduleid==1)$schedulename="Slot1";
		else if($scheduleid==2)$schedulename="Slot2";
		else if($scheduleid==3)$schedulename="Slot3";
		
		$sql="Select $schedulename from BlockBuster where ID='$blockbusterid'";
        $run=mysqli_query($con,$sql);
                
        if($run>0)
        {
            $data=mysqli_fetch_assoc($run);
            
			if($data[$schedulename]=="" || $data[$schedulename]==null)
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
				$slotstring=explode("|",$data[$schedulename]);
				$slotarray0=explode(";",$slotstring[0]);
				$slotarray1=explode(";",$slotstring[1]);
				$slotarray2=explode(";",$slotstring[2]);
			}
			
			
			//getting selected date
			if($_SESSION['MySchedule']==0)
			{
				//use $slotarray0 array
			}
			if($_SESSION['MySchedule']==1)
			{
				//use $slotarray1 array
			}
			if($_SESSION['MySchedule']==2)
			{
				//use $slotarray2 array
			}
			
			//now show value to the user if 1 then occupied
			//pass slot index value
        }
		
	}
	
	if(isset($_GET['SlotIndex']))
	{
		$slotindex=$_GET['SlotIndex'];
		if($_SESSION['MySchedule']==0)
		{
			if($slotarray0[$slotindex]==0)
			{
				$temp=$_SESSION['SeatOccupied'];
				$_SESSION['SeatOccupied']=$temp++;
				$slotarray0[$slotindex]=1;
			}
		}
		
		if($_SESSION['MySchedule']==1)
		{
			if($slotarray1[$slotindex]==0)
			{
				$temp=$_SESSION['SeatOccupied'];
				$_SESSION['SeatOccupied']=$temp++;
				$slotarray1[$slotindex]=1;
			}
		}
		
		if($_SESSION['MySchedule']==2)
		{
			if($slotarray2[$slotindex]==0)
			{
				$temp=$_SESSION['SeatOccupied'];
				$_SESSION['SeatOccupied']=$temp++;
				$slotarray2[$slotindex]=1;
			}
		}
		
		
		//encode and update to database and again refresh the page
				//first day
				$st="";
				for($i=0;$i<count($slotarray0);$i++)
				{
					if($i<19)
					$st.=$slotarray0[$i].";";
					else
					$st.=$slotarray0[$i];
					
				}
				$st+="|";
				
				//second day
				for($i=0;$i<count($slotarray1);$i++)
				{
					if($i<19)
					$st.=$slotarray1[$i].";";
					else
					$st.=$slotarray1[$i];
					
				}
				$st+="|";
				
				//third day
				for($i=0;$i<count($slotarray2);$i++)
				{
					if($i<19)
					$st.=$slotarray2[$i].";";
					else
					$st.=$slotarray2[$i];
					
				}
				
				//update to database
				$sql="UPDATE BlockBuster SET $schedulename = '$st' WHERE ID = '$blockbusterid'";
				$run=mysqli_query($con,$sql);
				if($run)
				{
				  echo "sucess";
				}else{
				  echo "Problem";
				}
				
	}
	$con->close(); 
?>