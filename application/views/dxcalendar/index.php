<div class="container">
	<br>
	<h2><?php echo $page_title; ?></h2>
	<p>This data is from <a target="_blank" href="https://ng3k.com/">https://ng3k.com/</a></p>

		<table style="width:100%" class="table-sm table table-bordered table-hover table-striped table-condensed dxcalendar">
			<thead>
				<tr>
					<th>Date from</th>
					<th>Date to</th>
					<th>DXCC</th>
					<th>Call</th>
					<th>QSL info</th>
					<th>Source</th>
					<th>Info</th>
				</tr>
			</thead>
			<tbody>
<?php
foreach($rss as $item) {
	echo '<tr>';
	echo "<td>" . $item->dates[0] ?? '' . "</td>";
	echo "<td>" . $item->dates[1] ?? '' . "</td>";
	echo "<td>";
	if ($item->dxcc_adif >= 1) { 
		echo '<a href="javascript:spawnLookupModal(\''.$item->dxcc_adif.'\',\'dxcc\')">';
	}
	if ($item->dxcc_cnfmd) { 
		echo '<span class="text-success">'; 
	} elseif ($item->dxcc_wked) { 
		echo '<span class="text-warning">'; 
	} elseif ($item->no_dxcc)  { 
		echo '<span>'; 
	} else  { 
		echo '<span class="text-danger">'; 
	}
	echo $item->dxcc."</span>";
	if ($item->dxcc_adif >= 1) {  echo "</a>"; }
	echo "</td><td";
	if ($item->call_cnfmd) { 
		echo ' class"text-success">'; 
	} elseif ($item->call_wked) { 
		echo ' class="text-warning">'; 
	} else  { 
		echo ' class="text-danger">'; 
	} 
	echo $item->call."</td>";
	echo "<td>$item->qslinfo</td>";
	echo "<td>$item->source</td>";
	echo "<td>$item->info</td>";

	echo '</tr>';
	echo "\n";
}
?>
		</tbody>
	</table>

</div>
<?php
// Define a function to extract the dates from the date range

