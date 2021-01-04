<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
		 <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7CPT+Serif:400,700,400italic' rel='stylesheet'>
		  <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
</head>
<style>
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
#red{
  background-color: #f44336;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}
#red {
  background-color: blue;
}
#blue{
  background-color: #f44336;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}
#blue {
  background-color: blue;
}
</style>
<body>

	<div class="bgimage">
		<div class="menu">

			<div class="leftmenu">
				<h2> Show Time </h2>
			</div>

			<div class="rightmenu">
				<ul>
					<li id="fisrtlist"> HOME </li>
					<li> Bollywood </li>
					<li> Hollywood </li>
					<li> Theatre Shows </li>
					<li>  Aboust us </li>
				</ul>
			</div>

		</div>

		<div class="text">
                        <h1> SHOWS FOR EVERYONE </h1>
			<h3> Book Now And Cherish Some Leisure Hours With Your Loved Ones </h3>
                        
                        <form action="movies_select.php" method="post">
                            Morning:
                            9:00-11:00 <input type="checkbox" name="morning" value="Yes" /><br>
                            Afternoon:
                            12:30-2:30 <input type="checkbox" name="afternoon" value="Yes" /><br>
                            Evening:
                            3:00-5:00 <input type="checkbox" name="evening" value="Yes" /><br>
                            Any:
                             <input type="checkbox" name="any" value="Yes" /><br><br>
                             <input type="submit" name="lucknow" value="Lucknow" />
                             <input type="submit" name="delhi" value="Delhi" />
                        </form>
		</div>

	</div>

</body>
</html>
