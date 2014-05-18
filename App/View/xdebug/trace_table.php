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
		<tr >
			<td style="padding-left:<?php echo ($trace['level'] * 25) ?>px">
				<?php if($trace['type'] == 0) {?>
				<a target="_blank" href="http://php.net/<?php echo $trace['function']; ?>">
				<img width="15px" height="15px" src="/static/img/xdebug/native.png" alt="PHP Native Function" /></a><?php } else {?>
				<img width="15px" height="15px" src="/static/img/xdebug/user.png" alt="User Defined Function" /><?php } ?><strong>
				<?php if($trace['type'] == 0) {?>php::<?php } ?><?php echo $trace['function']; ?>
				</strong><br />
				<small>
				<a onclick="showCode(this)" href="javascript:void(0)" data-file="<?php echo $trace['filename']; ?>" data-line="<?php echo $trace['line']; ?>">
					<?php echo $trace['filename']; ?>:
					<?php echo $trace['line']; ?>
				</a>
				</small>
				<span class="warning">
				<?php if($trace['timeAlert']) {?><br />Warning, time jump exceeds trigger! <?php echo $trace['timeAlert']; } ?>
				<?php if($trace['memoryAlert']) {?><br />Warning, memory jump exceeds trigger! <?php echo $trace['memoryAlert']; } ?>
				</span>
				
			</td>
			<td class="digit line">
			</td>
			<td class="digit" style="<?php if($trace['timeAlert']) {?>background:maroon;color:white<?php }?>">in: <?php echo $trace['timeOnEntry']; ?><br />out: <?php echo $trace['timeOnExit']; ?></td>
			<td class="digit" style="<?php if($trace['memoryAlert']) {?>background:maroon;color:white<?php }?>">in: <?php echo $trace['memoryOnEntry']; ?> MB<br />out: <?php echo $trace['memoryOnExit']; ?> MB</td>
		</tr>
		<?php
		}
		?>
	</table>