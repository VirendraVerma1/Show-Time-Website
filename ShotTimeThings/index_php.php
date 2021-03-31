<?php
//this page will be called by the index.php file , data of city,today,schedule will be passed to store in the sessions and arrange the movies currently ongoing in the entered city.

session_start();
        include("db_con.php");
       
        if(isset($_GET['City'])){
        $_SESSION['City']= $_GET['City'];//Lucknow
        $_SESSION['Today']=  $_GET['Today'];//2
        $_SESSION['Schedule1']=  $_GET['Schedule1'];//0,1
		$_SESSION['Schedule2']=  $_GET['Schedule2'];//0,1
		$_SESSION['Schedule3']=  $_GET['Schedule3'];//0,1
		$_SESSION['CurrentDayID']=$_GET['CurrentDayID'];//0 for today, 1 for tommorow, 2 day after tommorow
        
        //get the city and select all the malls movie id in array in non repeating format
        
        $allMovies=array();
		$city=$_SESSION['City'];
        $sql="Select Movie1,Movie2,Movie3 from BlockBuster where City='$city'";
        $run=mysqli_query($con,$sql);
                
         if($run>0)
         {
             $flag=false;
             while($data=mysqli_fetch_assoc($run))
             {
                     //For Movie 1 Column
                     $flag=false;
                  for($i=0;$i<count($allMovies);$i++)
                  {
                          
                          if($allMovies[$i]==$data['Movie1'])
                          {
                                $flag=true;  
                          }
                          
                  }
                  if($flag==false)
                  {
                      array_push($allMovies, $data['Movie1']);
                  }
                  
                  //For Movie 2 Column
                     $flag=false;
                  for($i=0;$i<count($allMovies);$i++)
                  {
                          
                          if($allMovies[$i]==$data['Movie2'])
                          {
                                $flag=true;  
                          }
                          
                  }
                  if($flag==false)
                  {
                      array_push($allMovies, $data['Movie2']);
                  }
                  
                  //For Movie 3 Column
                     $flag=false;
                  for($i=0;$i<count($allMovies);$i++)
                  {
                          
                          if($allMovies[$i]==$data['Movie3'])
                          {
                                $flag=true;  
                          }
                          
                  }
                  if($flag==false)
                  {
                      array_push($allMovies, $data['Movie3']);
                  }
                  
             }//end of while loop
             
             
             //Show the values of movie on that city
             
                 $sql="Select * from MovieBlock";
                 $run1=mysqli_query($con,$sql);
                
                 if($run1>0)
                 {
                         while($data1=mysqli_fetch_assoc($run1))
                           {
                                   //TODO  save to the javascript array
                                   echo $data1['ID'];
                                   echo $data1['Name'];
                                   echo $data1['Rating'];
                                   echo $data1['Language'];
                                   echo $data1['MovieImageLink'];
                           }
                 }
             
             
          }else{
          echo "Not Connected to database";
          }
        }else{
        echo "Not getting the values";
        }
        
        function GetAlltheCities()
        {
                $sql="Select City from BlockBuster";
                 $run=mysqli_query($con,$sql);
                
                 if($run>0)
                 {
                         while($data=mysqli_fetch_assoc($run))
                           {
                                   echo $data['City'];
                           }
                 }
        }
		
		// Date
        date_default_timezone_set('Asia/Kolkata');
        echo date('d');//write today
        echo date('D', strtotime($date .' +1 day'));
        echo date('D', strtotime($date .' +2 day'));

  /*
        //extra example
        
        $sql="Select * from BlockBuster where (Movie1ID=1 or Movie2ID=1 or Movie3ID=1) and City='Lucknow'";
                 $run=mysqli_query($con,$sql);
                
                 if($run>0)
                 {
                 echo "Runed";
                         while($data=mysqli_fetch_assoc($run))
                           {
                                   echo $data['City'];
                           }
                 }else{
                 echo "Prob";
                 }

*/
$con->close();
?>