<!DOCTYPE html>
<html lang="en">
<?php
## Database configuration

require_once 'config/db.php';

## Total number of records without filtering

//$stmtPrd = $conn->prepare("SELECT* FROM employee");

// while ($row = mysqli_fetch_assoc($stmtPrd)) {
//  while ($row  -> fetch_row($stmtPrd)) {
//      $result -> fetch_all(MYSQLI_ASSOC);
//    $data[] = array( 
//       "emp_name"=>$row['emp_name'],
//       "email"=>$row['email'],
//       "gender"=>$row['gender'],
//       "salary"=>$row['salary'],
//       "city"=>$row['city']
//    );
// }

$data[] = array();
$sql = 'SELECT* FROM employee';
foreach ($conn->query($sql) as $row) {




  array_push($data, $row);
}
print_r($data);


?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Datatable CSS -->
  <link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

  <!-- jQuery Library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Datatable JS -->
  <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>

<body>
  <!-- Table -->
  <table id='empTable' class='display dataTable'>

    <thead>
      <tr>
        <th>Employee name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Salary</th>
        <th>City</th>
      </tr>

    </thead>
    <tbody>
      <?php foreach ($data as $row) {
        $emp_id = $row['emp_name'];
        $email = $row['email'];
        $gender = $row['gender'];
        $salary = $row['salary'];
        $city = $row['city'];
      ?>
        <tr>
          <td><?php echo $emp_id; ?></td>
          <td><?php echo $email; ?></td>
          <td><?php echo $gender; ?></td>
          <td><?php echo $salary; ?></td>
          <td><?php echo $city; ?></td>
        </tr>
      <?php } ?>
    </tbody>

    <?php

    ?>

  </table>

  <script>
    $(document).ready(function() {
      $('#empTable').DataTable();
      console.log("dd");
    });
  </script>
</body>

</html>