<?php
session_start();
        include("db_con.php");
        
        if(isset($_GET['City'])){
        $_SESSION['City']= $_GET['City'];//Lucknow
        $_SESSION['Today']=  $_GET['Today'];//2
        $_SESSION['Schedule']=  $_GET['Schedule'];//1,2,3

        
        //get the city and select all the malls movie id in array in non repeating format
        
        $allMovies=array();
        $sql="Select Movie1,Movie2,Movie3 from BlockBuster where City='$_SESSION['City']'";
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


?>