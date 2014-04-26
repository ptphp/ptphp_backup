	<style>
	
	*,html * {
	font: 12px verdana, sans-serif;
	color: black;
}

strong {
	font-weight: bold;
}

small {
	font-size: 11px;
}

h1 {
	font-size: 24px;
	font-weight: bold;
}

h2 {
	font-size: 18px;
}

label {
	display: block;
	margin-bottom: 5px;
}

img {
	vertical-align: middle;
	border: 0;
}

table {
	width: 100%;
}

td,th {
	padding: 3px;
	vertical-align: top;
}

th {
	background: #343434;
	color: white;
	text-align: left;
}

td.digit {
	text-align: right;
}

a {
	color: navy;
	text-decoration: none;
}

a:hover {
	text-decoration: underline;
}

a:visited {
	color: purple;
}

span.warning {
	font-weight: bold;
	color: maroon;
	font-size: 11px;
}

tr.near td {
	background: #fffac1;
}

tr.line td {
	background: #f7f09f;
}
	</style>
	
	<?php 
	
	
	echo "<table>";
		if(!isset($_GET['file']) || !file_exists($_GET['file']) ) {
			die('File not found...');
		}
		$lines = file_get_contents($_GET['file']);
		$lines = explode("\n", $lines);
		$i = 1;
		foreach($lines as $line) {
		
			$class = '';
			if($i > ($_GET['line'] - 4) && $i < $_GET['line']) {
				$class = 'near';
			}
			if($i < ($_GET['line'] + 4) && $i > $_GET['line']) {
				$class = 'near';
			}
			if($i == $_GET['line']) {
				$class = 'line';
			}
		
			echo '<tr class="' . $class . '"><td class="digit"><a name="l' . ($i) . '">' . ($i) . '</a></td><td>' . str_replace('&lt;?php&nbsp;','',highlight_string('<?php ' . $line,true)) . '</td></tr>';
			$i++;
		}
		
		echo "</table>";
	