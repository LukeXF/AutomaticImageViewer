<!-- Automatic photo displayer by Luke Brown -->
<!-- Free to adapt, just please star my repo to show you appreciation -->
<!-- https://github.com/LukeXF/AutomaticImageViewer -->
<!-- Cheers -->

<head>
	<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.css">
	<title>Displaying photos in directories automatically</title>
	<style type="text/css">
		body{
			background-color: #E8E8E8;
			color: #555; 
		}
		img {
			border: solid 1px #999;
			margin: 10px;
		}
		.footer {
			margin-bottom: 50px;
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h1>Displays photos in directories automatically</h1>
				<hr>

				<div class="container"><div class="row">
				<?php






				// selects the photos directory 
				$dir    = 'photos/';

				// scans the directory
				$files1 = scandir($dir);

				// this time with orderering
				$files2 = scandir($dir, 1);

				// removes the default linux directorying placement dots. pffff
				$blacklist = array('.', '..', 'photosx', 'lukeisthebest.php', '.DS_Store');
				$scanned = array_diff( $files1 , $blacklist );
				$final = array();
				$final = $scanned;

				// displays the array with the blacklist values removed
				echo "<div class='col-md-3'><pre>";
				echo "<b>Inital Array</b> ";
				print_r($scanned);
				echo "</pre></div>";

				// displays the array with blacklist values removed and keys reset
				echo "<div class='col-md-3'><pre>";
				// resets the array keys
				$final = array_values($scanned);
				echo "<b>Array with correct keys:</b> ";
				print_r($final);
				echo "</pre></div>";

				// displays the full file directories
				echo "<div class='col-md-3'><pre>";
				echo "<b>Full Orginal Array</b> ";
				print_r($files1);
				echo "</pre></div>";

				// displays the full file directories with the order flipped
				echo "<div class='col-md-3'><pre>";
				echo "<b>A-Z swiched</b> ";
				print_r($files2);
				echo "</pre></div>";

				echo "</div></div>";












				echo "<hr><div class='container'><div class='row'>";

				// counts the total value of the array by count each directory
				$arrayCount = count($final);
				// sets the counter ready for the while loop
				$counter = 1;

				$open = "<div align='center' class='col-md-4'>";
				$close = "</div>";

				// human visuals to show how many directories are been displayed
				echo $open . "<b>There are " . $arrayCount . " directories that we're going to display</b>" . $close;


				// human visuals to display how many photos there are overall
				$photocounter = 0;
				echo $open . "<div id='divID'></div>" . $close;

				echo $open . "<b>Make sure the server can read the directories &amp; files</b> " . $close;

				echo "</div></div><hr>";














				// While counter is less than the total amount of files
				while ($counter <= $arrayCount) {

					// The directory we want to load
					$root = "testing/";
				
					// Displays
					$files = glob("photos/" . $final[($counter -1)] ."/*.*");

					echo "<h2>Folder " . $counter . " - " . $final[($counter -1)] . "</h2><div class='row'>";

					// creates the for loop that counts each photos
					for ($i=0; $i < count($files); $i++)
					{
						// sets num to the file number
						$num = $files[$i];

						// display each 25% and place the photo in along with a clickable link
						echo "<div class='col-md-3'>";
							if(isset($files[$i])){

								// loads the image
							    echo '<img width="75%" src="http://localhost/testing/' . $num . '" alt="Image" />' . "<br /><br />";
	
							    $num1 = str_replace($root . 'Images/', '', $num);


							    // Checks to load the file name extension
							    if (strpos($num1,'.png') == true) {
							        $text = str_replace('.png', '', $num1);
							    }
							    if (strpos($num1,'.JPEG') == true) {
							        $text = str_replace('.jpeg', '', $num1);
							    }
							    if (strpos($num1,'.JPG') == true) {
							        $text = str_replace('.jpg', '', $num1);
							    }
							    /*
									Later on we can use this file extension checker to 
									only display files that match these statements
							    */
							    
							    // adds one to the counter to get the overall photo
								$photocounter++;

							    print "<a target='_blank' href='" . $text . "'><p>" . $text . "</p></a><br />";
							}
						echo '</div>';
					}
					echo "</div>";

					$counter++;

				}


				// This loads amount of total photos and places it with javascript at the top of the page using $photocounter
				?>
				<script type="text/javascript">
				var div = document.getElementById('divID');
				div.innerHTML = div.innerHTML + '<?php echo "<b>We have loaded " . $photocounter . " photos overall to display.</b>"; ?>';

				</script>

				<div class="row footer">
					<div class="col-md-8 col-md-offset-2">
						<div align="center" class="col-md-4">Code &amp; Photos by <a target="_blank" href="http://luke.sx">Luke Brown</a></div>
						<div align="center" class="col-md-4">Fork code on         <a target="_blank" href="https://github.com/LukeXF/AutomaticImageViewer">Github</a></div>
						<div align="center" class="col-md-4">Have an issue?       <a target="_blank" href="https://twitter.com/DiamondXF">Tell me</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
