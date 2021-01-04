<?php
session_start();
    include("db_con.php");
    
?>
<!DOCTYPE html>
<html>
<title>Book Show</title>

<body>



<table>
	<tr>
                <td><?php
                        $movieID=$_SESSION['MovieID'];
                        $moviename="";
                        $movierating="";
                        $movielanguage="";
                        $movieSql="Select * from MovieBlock where id='$movieID'";
                        $runmovie=mysqli_query($con,$movieSql);
                        if($runmovie>0)
                        {
                                $data=mysqli_fetch_assoc($runmovie);
                                echo '<img src='.$data['MovieImageLink'].' width=135 height = 200>';
                                $moviename=$data['Name'];
                                $movierating=$data['Rating'];
                                $movielanguage=$data['Language'];
                        }
                        
                ?>
		</td>
		<td>
			<?php
                        $temp=explode("_",$_SESSION['MySchedule']);
                        $blockbusterid=$temp[0];
                        $movieSql="Select * from BlockBuster where id='$blockbusterid'";
                        $runmovie=mysqli_query($con,$movieSql);
                        if($runmovie>0)
                        {
                                $data=mysqli_fetch_assoc($runmovie);
                                echo $moviename."<br>";
                                echo $movierating."<br>";
                                echo $movielanguage."<br>";
                                echo $data['Name']."<br>";
                                echo $data['Address']."<br>";
                                echo $data['City']."<br>";
                        }
                        
                        ?>
                        
		</td>
	</tr>
</table>

<?php
      $st=explode(",",$_SESSION['MySeat']);  
      echo "Your Seats :";
      for($i=0;$i<count($st);$i++)
      {
              if($st[$i]>-1){
              echo ($st[$i]);
              if($i<count($st)-2)
              echo " ";
              }
      }
?>


<div align="center">
<?php
    if(isset($_GET['Error']))
    {
        echo  '<p style="color:red;"> '.$_GET['Error'].'</p>'; 
    }
?>
<form action="bookandcreateaccount.php" method="POST">
<br>
<h3>SignUp</h3>
<br>
<input type="text" name="firstname" placeholder="First name:" required> 
<br>
<input type="text" name="lastname" placeholder="Last name:" required> 
<br>
<input type="email" name="email" placeholder="Email:" required> 
<br>
<input type="password" name="password" placeholder="Password:" required> 
<br>
<input type="hidden" name="signup" value="1" />
<br>
<input type="submit" value="Book Show and SignUp">
</form>

<form action="bookandcreateaccount.php" method="POST"> 
<br><br>
<h3>LogIn</h3>
<br>
<input type="email" name="email" placeholder="Email:" required>
<br>
<input type="password" name="password" placeholder="Password:" required> 
<br>
<br>
<input type="hidden" name="login" value="1" />
<input type="submit" value="Book Show and LogIn">
<br>
</form>
</div>
</body>
</html>