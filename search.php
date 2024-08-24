
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Records</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid  mt-4 p-4">
        <h1 style="text-align: center;">All Employee Records</h1>

        <?php
                 include 'connection.php';
   
                $sql = "SELECT * FROM `employee`";
                $result = mysqli_query($conn,$sql);
              if ($result) {
            if ($result->num_rows > 0) {
                // Output data of each row
                echo '<table class="table table-striped table-bordered">';
                echo '<thead class="thead-dark">';
                echo '<tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Number</th>
                        <th>Country</th>
                        
                        <th>Gender</th>
                        <th>Language</th>
                        <th>Message</th>
                        <th>Action</th>
                      </tr>';
                echo '</thead>';
                echo '<tbody>';

                while ($row=mysqli_fetch_assoc($result)) {
                    echo '<tr>
                            <td>' .($row["id"]) .'</td>
                            <td>' .($row["name"]) . '</td>
                            <td>' .($row["address"]) . '</td>
                            <td>' .($row["email"]) . '</td>
                            <td>' .($row["number"]) . '</td>
                            <td>' .($row["country"]) . '</td>
                            
                            <td>' .($row["gender"]) . '</td>
                            <td>' .($row["language"]) . '</td>
                            <td>' .($row["msg"]) . '</td>
                            <td> <button type="submit" name="update" class="btn btn-primary" ><a class="text text-white" href="update.php?updateid='.($row["id"]).'">Update</a></button> &nbsp;
                            <button type="submit" name="delete" class="btn btn-danger"><a class="text text-white" href="delete.php?deleteid='.($row["id"]).'">Delete</a></button></td>
                          </tr>';
                }

                echo '</tbody>';
                echo '</table>';
            } else {
                echo '<div class="alert alert-warning">No records found.</div>';
            }
        } else {
            echo '<div class="alert alert-danger">Error fetching records: ' . $conn->error . '</div>';
        }

        $conn->close();
        ?>

        <a href="crud.php" class="btn btn-primary mt-3">Go back to Insert Record</a>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
