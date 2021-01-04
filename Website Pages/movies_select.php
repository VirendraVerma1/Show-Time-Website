<?php
//http://showtimebbd.atwebpages.com/movies_select.php?City=Lucknow&Today=0&Schedule1=1&Schedule2=1&Schedule3=1&CurrentDayID=0
//this page will be called by the index.php file , data of city,today,schedule will be passed to store in the sessions and arrange the movies currently ongoing in the entered city.
session_start();
        include("db_con.php");
        
        $idarray=array();
        $namearray=array();
        $ratingarray=array();
        $languagearray=array();
        $moviearray=array();
       
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
        
        $sql="Select Movie1ID,Movie2ID,Movie3ID from BlockBuster where City='$city'";
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
                                   array_push($idarray,$data1['ID']);
                                   array_push($namearray,$data1['Name']);
                                   array_push($ratingarray,$data1['Rating']);
                                   array_push($languagearray,$data1['Language']);
                                   array_push($moviearray,$data1['MovieImageLink']);
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

<!DOCTYPE html>
<html>
<title>Movie Selection</title>

<body>

<h1><?php echo $city;?></h1>
<table>
<tr>

</tr>
</table>


<table style="width:100%" align="center" cellspacing="3">
                <?php
                        for($i=0;$i<count($idarray);$i++)
                        {
                                echo '<tr>
                        <td>
                          <tr>
                          
                                <img src='.$moviearray[$i].'  width=200 height=300>
                                <br>
                                '.$namearray[$i].'
                                <br>
                                '.$ratingarray[$i].'
                                <br>
                                '.$languagearray[$i].'
                                <br>
                                <a href="http://showtimebbd.atwebpages.com/multiiplex.php?MovieID='.$idarray[$i].'">Book</a>
                          </tr>
                          
                        <td>
                        </tr><br><br><br>';
                        }
                
                ?>

</table>

</body>
</html>
