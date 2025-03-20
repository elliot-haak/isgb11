<?php
	include("include/oneDice.php");
	include("include/sixDices.php");

	function publishData( $inSum, $inNbr ) {

		$avg = 0;
		if($inSum > 0 && $inNbr > 0) {

			$avg = number_format( ( $inSum / $inNbr ), 2 );
		}

		return "<div><p>Antal: $inNbr</p><p>Totalt: $inSum</p><p>Medel: $avg</p></div>";
	}
	
	$disabled = true;

?>
<!doctype html>
<html lang="en" >

	<head>
		<meta charset="utf-8">
		<title>Roll the dice...</title>	
		<link href="style/style.css" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	</head>

	<body>
		
		<div>

			<?php 
			
				/*
					Till ert förfogande har ni för kakor två klasser och en funktion så studera dessa noggrant innan ni börjar.
					
					Kravspecen:

					1. 	När användaren klickar på knappen btnNewGame skall: 
						a.	Texten ”New Game!” visas för användaren och 
						b. 	Kakorna nbrOfRounds och sumOfAllRounds skapas och tilldelas värdet 0. 
						c. 	Submit-knapparna btnRoll och btnExit skall också göras användbara. 
						
						Tips! 
						En kontroll!
						Variabeln $disabled!

					2. 	Om kakorna nbrOfRounds och sumOfAllrounds kommer till servern och ingen av 
					   	submit-knapparna (varken btnRoll, btnNewGame eller btnExit är tryckta) skall:
					   	a. 	Användaren se antalet gånger ni rullat de sex tärningarna, totalsumman av alla 
					   		rullningar och medelvärdet för alla rullningar. 
					   	b. 	Submit-knapparna btnRoll och btnExit skall också göras användbara. 

					   	Tips!
					   	Fem kontroller!
					   	Variabeln $disabled!
							
					3. 	Om användaren klickar på btnRoll och kakorn nbrOfRounds och sumOfAllRounds 
						kommer till servern skall:
						a.	Sex tärningar rullas och resultatet visas som bilder på tärningarna. 
						b. 	Därtill skall ni också för användaren presentera antalet gånger ni rullat de sex tärningarna, 
							totalsumman av alla rullningar och medelvärdet för alla rullningar. 
						c.	Submit-knapparna btnRoll och btnExit skall också göras användbara.
						d. 	Avslutningsvis skall också innehållet i kakorna nbrOfRounds och sumOfAllRounds uppdateras. 

						Tips!
						Tre kontroller!
						Variabeln $disabled!

					4. 	Om användaren klickar på btnExit och kakorna nbrOfRounds och sumOfAllRounds 
						kommer till servern skall:
						a. Kakorna tas bort på klienten.
						b. Knapparna btnRoll och btnExit skall inte längre vara användbara. 

						Tips!
						Tre kontroller!
						Variabeln $disabled!

				*/

				//SKRIV KOD HÄR
				//kravspec punkt 1
				
				if (isset($_POST["btnNewGame"])){
					$disabled = false; 
					setcookie("nbrOfRounds", 0, time() + 3600);
					setcookie("sumOfAllRounds", 0, time() + 3600);
					echo ("<p>New game!</p>");
				}

				//kravspec punkt 2.
				if(isset($_COOKIE["nbrOfRounds"]) && isset($_COOKIE["sumOfAllRounds"]) && !isset($_POST["btnRoll"]) && !isset($_POST["btnExit"]) && !isset($_POST["btnNewGame"])){
					echo(publishData($_COOKIE["nbrOfRounds"], $_COOKIE["sumOfAllRounds"]));
					$disabled = false;
				
				}

				//kravspec punkt 3.
				if(isset($_POST["btnRoll"]) && isset($_COOKIE["sumOfAllRounds"]) && isset($_COOKIE["nbrOfRounds"])){
					$sixDices = new SixDices();
					$sixDices -> rollDices();
					$sum = $_COOKIE["sumOfAllRounds"] + $sixDices -> sumDices();
					$num = $_COOKIE["nbrOfRounds"] + 1;
					setcookie("sumOfAllRounds", $sum, time() + 3600);
					setcookie("nbrOfRounds", $num, time() + 3600);

					echo($sixDices -> svgDices());
					echo(publishData($_COOKIE["sumOfAllRounds"], $_COOKIE["nbrOfRounds"]));

					$disabled = false;

				}

				//kravspec punkt 4.
				if(isset($_COOKIE["sumOfAllRounds"]) && isset($_COOKIE["nbrOfRounds"]) && isset($_POST["btnExit"])){
					$disabled = true; 
					setcookie("sumOfAllRounds", "", time() - 3600);
					setcookie("nbrOfRounds", "", time() - 3600);
				}

			?>

		</div>
		
		<form action="<?php echo( $_SERVER["PHP_SELF"] ); ?>" method="post">
			<input type="submit" name="btnRoll" class="btn btn-primary" value="Roll six dices" <?php if($disabled) { echo("disabled"); } ?>> 
			<input type="submit" name="btnNewGame" class="btn btn-primary" value="New Game">
			<input type="submit" name="btnExit" class="btn btn-primary" value="Exit" <?php if($disabled) { echo("disabled"); } ?>> 
		</form>

		<script src="script/animation.js"></script>
	</body>

</html>