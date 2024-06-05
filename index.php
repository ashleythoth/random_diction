<link rel="stylesheet" href="style.css">

<?php

if ( isset($_POST['submit']) ) {
	
	// Get number of lines
	$file = new SplFileObject('words.csv', 'r');
	$file->seek(PHP_INT_MAX);
	$numlin = $file->key() - 1;
	
	// Array of random line numbers equal to form input
	for ( $a = 0; $a < $_POST['num']; $a++ ) {
		$wrd[$a] = rand(0,$numlin - 1);
	}
		
	
	// Display line
	$myFile = "words.csv";
	$lines = file($myFile);
	for ( $a = 0; $a < sizeof($wrd); $a++ ) {
		echo $lines[$wrd[$a] - 1]." ";
	}

}

?>

<?php if ( !isset($_POST['submit']) ) { ?>
<div>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		<label for="num">Amount of words:</label><br>
		<input type="number" id="num" name="num"><br>
		<input name="submit" type="submit" value="submit">
	</form>
</div>
<?php } ?>

