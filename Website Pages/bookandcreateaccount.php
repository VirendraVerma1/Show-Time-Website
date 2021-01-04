<?php
session_start();
    include("db_con.php");
    
    ?><html>
    <head>
        <title>Show Time</title>
    </head>
    

<?php
            
    if(isset($_POST['login']))
    {
            
            $email= $_POST['email'];
            $password=$_POST['password'];
            $myseat=$_SESSION['MySeat'];
            $sql="Select * from BookShowUser where Email='$email' and Password='$password'";
            $run=mysqli_query($con,$sql);
            if($run)
            {
                 $row = mysqli_fetch_row($run);
                 if($row==0)
                 echo '<script>window.open("http://showtimebbd.atwebpages.com/bookshow.php?Error=NoAccount","_self");</script>';
                 else{
                         $sql="UPDATE BookShowUser SET MySeat = '$myseat' WHERE Email = '$email' and Password='$password'";
                         $run=mysqli_query($con,$sql);
                         if($run)
                         {
                           echo '<h1 align="center">Thank You for booking</h1>';
                         }else{
                           echo 'window.open("http://showtimebbd.atwebpages.com/bookshow.php?Error=NoAccount","_self")';
                         }
                 }
            }
    }
    
    if(isset($_POST['signup']))
    {
            
            $firstname= $_POST['firstname'];
            $secondname= $_POST['secondname'];
            $email= $_POST['email'];
            $password= $_POST['password'];
            $location=$_SESSION['City'];
            $myseat=$_SESSION['MySeat'];
            $sql="INSERT INTO BookShowUser (FirstName,SecondName, Email, Password, Location, MySeat) VALUES ('$firstname', '$secondname', '$email','$password','$location','$myseat')";
       
            if ($con->query($sql) === TRUE)
            {
               $last_id = $con->insert_id;   
                 
                 echo '<h1 align="center">Thank You for booking</h1>';
             }
            else{
                    echo 'window.open("http://showtimebbd.atwebpages.com/bookshow.php?Error=NotInserting","_self")';
               }
                $con->close(); 
    }

?>
</html>