<?php

include_once('functions.php');

$zip = $_GET['zip'];

$pdo = dbConnect();
$sql = "SELECT Zips.zip, Cities.name as \"city\", States.id as \"state\" FROM Zips, Cities, States WHERE zip like \"%$zip%\" AND Zips.city_id=Cities.id AND Cities.state_id=States.id";
$results = $pdo->query($sql);

?>

<table class="table table-sm table-striped">
	<thead>
		<tr>
			<th>Zip</th>
			<th>City</th>
			<th>State</th>
		</tr>
	</thead>

	<tbody>

		<?php

			while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
				echo '<tr>';

				echo '<td>' . $row['zip'] . '</td>';
				echo '<td>' . $row['city'] . '</td>';
				echo '<td>' . $row['state'] . '</td>';

				echo '</tr>';
			}



		?>


	</tbody>
</table>
