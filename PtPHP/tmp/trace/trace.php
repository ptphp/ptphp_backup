<?php 
require 'trace.config.php';
?>
<html>
<head>
	<style type="text/css">
		@import url('trace.css');
	</style>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<title>Xdebug Trace File Parser</title>
</head>
<body>
<h1>Xdebug Trace File Parser</h1>
<h2>Settings</h2>
<form method="get">
	<label>File
	<select name="file">
	<?php

	echo '<option value="" selected="selected"> -- Select -- </option>';

	$files = new DirectoryIterator ( $config['directory'] );
	foreach ( $files as $file ) {
		
		if (substr_count ( $file->getFilename (), '.xt' ) == 0 || in_array($config['directory'] . '/' . $file->getFilename(), $ownTraces)) {
			continue;
		}
		
		$date = explode ( '.', $file->getFilename () );
		$date = date ( 'Y-m-d H:i:s', $date [0] );
		
		echo '<option value="' . $file->getFilename () . '"> ' . $date . ' - ' . $file->getFilename () . ' </option>';
	}
	?>
	</select>
	</label>
	
	<label>If the memory jumps <input type="text" name="memory" value="0.3" style="text-align:right" size="5"/> MB, provide an alert</label>
	<label>If the execution time jumps <input type="text" name="time" value="0.3" style="text-align:right" size="5"/> seconds, provide an alert</label>
	
	<input type="submit" value="parse" />
	
</form>

<h2>Output</h2>
<?php
$traceFile = $config['directory'] . '/' . $_GET ['file'];

$memJump = 1;
if(isset($_GET['memory'])) {
	$memJump = (float) $_GET['memory'];
}

$timeJump = 1;
if(isset($_GET['time'])) {
	$timeJump = (float) $_GET['time'];
}

if (! isset ( $_GET ['file'] ) || empty ( $_GET ['file'] )) {
	echo '<p>No file selected</p>';
} else if (! file_exists ( $traceFile )) {
	echo '<p>Invalid file</p>';
} else {
	
	$trace = file_get_contents ( $traceFile );
	$lines = explode ( "\n", $trace );
	
	foreach ( $lines as $line ) {
		
		$data = explode("\t",$line);
		list($level, $id, $point, $time, $memory, $function, $type, $file, $filename, $line) = $data;
		
		// we want that in megabytes
		$memory = round ( $memory	 / (1024 * 1024), 4 );
		
		if(empty($function)) {
			$fullTrace[$id]['timeOnExit'] = $time;
			$fullTrace[$id]['memoryOnExit'] = $memory;
			continue;
		}
		
		if($point == 0) {
			// starting function
			$fullTrace[$id] = array( 'level'=>$level, 'id'=>$id, 'timeOnEntry'=>$time, 'memoryOnEntry' => $memory, 'function'=>$function, 'type'=>$type, 'file'=>$file, 'filename'=>$filename, 'line'=>$line );
			
			if( ($memory - $lastMemory) > $memJump ) {
				$fullTrace[$id]['memoryAlert'] = $memory - $lastMemory;
			} else{
				$fullTrace[$id]['memoryAlert'] = false;
			}
			

			if( ($time - $lastTime) > $timeJump ) {
				$fullTrace[$id]['timeAlert'] = $time - $lastTime;
			} else{
				$fullTrace[$id]['timeAlert'] = false;
			}
			
			$lastMemory = $memory;
			$lastTime = $time;
		
		} else {
			$fullTrace[$id]['timeOnExit'] = $time;
			$fullTrace[$id]['memoryOnExit'] = $memory;
		}
		
	}
	?>
	<table>
		<tr>
			<td>
				<?php echo $traceFile; ?><br />
				<strong><?php echo count($fullTrace); ?></strong> function calls in <strong><?php $l = end($fullTrace); echo $l['timeOnEntry']; ?> seconds</strong>, using <strong><?php echo $l['memoryOnEntry']; ?> MB</strong> of memory.
			</td>
			<td></td>
			<td style="vertical-align:bottom"><small>in = start func.<br />out = end func.</small></td>
			<td style="vertical-align:bottom"><small>in = start func.<br />out = end func.</small></td>
		</tr>
		<tr>
			<th>Function / File</th>
			<th>Line</th>
			<th>Time</th>
			<th>Memory</th>
		</tr>
		<?php 
		foreach($fullTrace as $trace) {
		?>
		<tr>
			<td style="padding-left:<?php echo ($trace['level'] * 10) ?>px">
				<?php if($trace['type'] == 0) {?><a target="_blank" href="http://php.net/<?php echo $trace['function']; ?>"><img src="images/native.png" alt="PHP Native Function" /></a><?php } else {?><img src="images/user.png" alt="User Defined Function" /><?php } ?><strong><?php if($trace['type'] == 0) {?>php::<?php } ?><?php echo $trace['function']; ?></strong><br />
				<small><?php echo $trace['filename']; ?></small>
				<span class="warning">
				<?php if($trace['timeAlert']) {?><br />Warning, time jump exceeds trigger! <?php echo $trace['timeAlert']; } ?>
				<?php if($trace['memoryAlert']) {?><br />Warning, memory jump exceeds trigger! <?php echo $trace['memoryAlert']; } ?>
				</span>
				
			</td>
			<td class="digit line"><a href="#<?php echo $trace['line']; ?>"><?php echo $trace['line']; ?></a></td>
			<td class="digit" style="<?php if($trace['timeAlert']) {?>background:maroon;color:white<?php }?>">in: <?php echo $trace['timeOnEntry']; ?><br />out: <?php echo $trace['timeOnExit']; ?></td>
			<td class="digit" style="<?php if($trace['memoryAlert']) {?>background:maroon;color:white<?php }?>">in: <?php echo $trace['memoryOnEntry']; ?> MB<br />out: <?php echo $trace['memoryOnExit']; ?> MB</td>
		</tr>
		<?php
		}
		?>
	</table>
	<?php 
	
}

?>

<script type="text/javascript">
$(document).ready(function() {
	$('td.line a').each(function() {

		$(this).click(function() {
			showCode(this);
		})

	})
})

function showCode(where) {
	var file = $(where).parent().parent().find('small').text();
	window.open('trace-code.php?line=' + $(where).text() + '&file=' + file + '#l' + $(where).text(), 'code', 'width=500,height=400,toolbar=no,status=no,menubar=no,scrollbars=yes');
}

</script>
</body>
</html>