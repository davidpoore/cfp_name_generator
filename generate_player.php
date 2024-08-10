<?php
  require_once __DIR__.'/vendor/autoload.php';

  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../../');
  $dotenv->load();

  $conn = mysqli_connect($_ENV["DB_HOST"], $_ENV["CFP_DB_USER"], $_ENV["CFP_DB_PWD"], $_ENV["CFP_DB_NAME"]);

  $sql = 'SELECT id, name FROM first_names';
  $first_names = mysqli_query($conn, $sql);
	$total_first_names = mysqli_num_rows($first_names);

  $random_id = rand(0,$total_first_names - 1);

  $first_name = 'ERROR';
  while($row = mysqli_fetch_assoc($first_names)) {
    if ($row['id'] == $random_id) {
      $first_name = $row['name'];
      break;
    }
  }

  $sql = 'SELECT id, name FROM last_names';
  $last_names = mysqli_query($conn, $sql);
	$total_last_names = mysqli_num_rows($last_names);

  $random_id = rand(0,$total_last_names - 1);

  $last_name = 'ERROR';
  while($row = mysqli_fetch_assoc($last_names)) {
    if ($row['id'] == $random_id) {
      $last_name = $row['name'];
      break;
    }
  }

  $sql = 'SELECT id, name FROM positions';
  $positions = mysqli_query($conn, $sql);
	$total_positions = mysqli_num_rows($positions);

  $random_id = rand(0,$total_positions - 1);

  $position = 'ERROR';
  while($row = mysqli_fetch_assoc($positions)) {
    if ($row['id'] == $random_id) {
      $position = $row['name'];
      break;
    }
  }

  echo '<span class="position">'.$position.'</span> '.$first_name.' '.$last_name;

  mysqli_close($conn);
?>
