<?php

		include 'includes/dbconnect.php';

		// $id = isset( $_GET['id']);
		 // $id = (isset($_POST['id']) ? $_POST['id'] : '');
		 $name = (isset($_POST['name']) ? $_POST['name'] : '');
		 $age = (isset($_POST['age']) ? $_POST['age'] : '');
		 $email = (isset($_POST['email']) ? $_POST['email'] : '');

$query = "SELECT name AS name,age AS age,email AS email, id FROM register";

$result = mysqli_query ($mysqli, $query); // Run the query.
// var_dump($result);
// die();

if ($result) { // If it ran OK, display the records

					// Table header. 
				echo '<table class="table">
				<tr class="heading"><td class="col head"><b>Name</b></td class="col head"><td class="col head"><b>Age</b></td>
				<td class="col head"><b>Email</b></td>
				</tr>';
				// Fetch and print all the records: 
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				echo '<tr class="heading2"><td class="col">' . $row['name'] . '</td><td class="col">'.  $row['age'] . '</td>
				<td class="col">'.  $row['email'] . '</td>
				</tr>'; }
				echo '</table>'; // Close the table so that it is ready for displaying.
				mysqli_free_result ($result); // Free up the resources.
			   } 

else { // If it did not run OK.
		// Error message:
		echo '<p class="error">The current users could not be retrieved. We apologize 
		for any inconvenience.</p>';
		// Debug message:
		echo '<p>' . mysqli_error($mysqli) . '<br><br>Query: ' . $query . '</p>';
     } // End of if ($result)

?>

