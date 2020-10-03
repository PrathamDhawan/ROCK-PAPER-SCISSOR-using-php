<?php 
$text = "Please select a strategy and press Play.";
$compChoice=0;
$humanChoice=0;
$result;
$names = array("Rock","Paper","Scissors");
		
		if(!isset($_GET['name'])){
			die("Name parameter missing");
		}
		if(isset($_POST['lout'])){
			header('Location: index.php');
		}
	
	function check($computer, $human , $names) {

		if(($names[$computer] == "Rock" and $names[$human] == "Scissors")
		or ($names[$computer] == "Scissors" and $names[$human] == "Paper")
		or ($names[$computer] == "Paper" and $names[$human] == "Rock")){
		
			return "You Lose";
		}
		
		if(($names[$computer] == "Paper" and $names[$human] == "Paper")
		or ($names[$computer] == "Rock"  and $names[$human] == "Rock")
		or ($names[$computer] == "Scissors" and $names[$human] == "Scissors")){

			return "Tie";
		}
	
		if(($names[$computer] == "Rock" and $names[$human] == "Paper")
		or ($names[$computer] == "Paper" and $names[$human] == "Scissors")
		or ($names[$computer] == "Scissors" and $names[$human] == "Rock")
	){
			
			return "You Win";
		}
		return;
	}

 ?>
<html>
<head>
	<title>Pratham Dhawan 531307a3 </title>
	</head>
	<body>
			<h1>Rock Paper Scissors</h1>
			<p>
				Welcome: <?= $_GET['name'] ?>
			</p>
		
			<form method="POST">
			<select name="human">
				<option value="0">Select</option>
				<option value="1">Rock</option>
				<option value="2">Paper</option>
				<option value="3">Scissors</option>
				<option value="4">Test</option>
			</select>
			<input type="submit" value="Play" name="play">
			<input type="submit" name="lout" value="Logout">		
			</form>
	<p>
		<?php 
		if(!isset($_POST['play'])){
			echo $text;
		}
		?>
	</p>
	<p>
	<?php 	
	if(isset($_POST['play'])){
		$humanChoice = $_POST['human'];

		if($humanChoice == 0){

			$text = "Please select a strategy and press Play.";
			echo $text;
		}
		elseif($humanChoice == 4){

			for($i=0;$i<3;$i++){
			for($j=0;$j<3;$j++){

				$result = check($i,$j,$names);
				print "Human= ".$names[$j]." Computer= ".$names[$i]." Result= ".$result."<Br>";
			}
		}
	}	
		else{

			$compChoice = rand(0,2);
			$result = check($compChoice,$humanChoice-1,$names);
			$text = "Your Play=".$names[$humanChoice-1]." Computer Play=".$names[$compChoice]." Result=".$result;
			echo $text;
	}
}
		?>	
	</p>
	</body>
</html>