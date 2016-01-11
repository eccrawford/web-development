	<!DOCTYPE html>

	<head>
		<title>A Travel Guide</title>
		<link href="aboyandhisferret.ico" rel="icon" type="image/x-icon"/>
		<h1><span>A Travel Guide</span></h1>
	</head>

	<body>
		<center>
			<img src="globe.jpg">
		<?php
			$file = file("hometowns.txt", FILE_IGNORE_NEW_LINES);
			$file2 = fopen("actualHometowns.txt", 'a');

			if (file_get_contents("actualHometowns.txt") == '') {
				for ($i=1; $i <count($file); $i++) {
					fwrite($file2, $file[$i]."\n");
				}
			}
			fclose($file2);

			#extracts each person's page info, then sorts the pages into city categories and prints them

			$file2 = file('actualHometowns.txt');
			foreach ($file2 as $page) {
				$line = (explode('|', $page));
				$url = (explode('/', $line[2]));
				$sort[$line[1]][] = "<a href=\"$line[2]\">$url[3]'s Page</a>";
			}

			foreach($sort as $first => $second) {
				echo '<div class="header" style="font-size: 40px !important;">'.$first."<br>".'</div>';
				foreach ($second as $link) {
					print $link."<br>";
				}
			}
			
		?>
		</center>
	</body>

</html>