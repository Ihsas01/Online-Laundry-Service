<?php 
 include '../db_connect.php'
?>








<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  </head>
  <body>
      <section id="menu">
        <div class="logo">
            <img src="logo4.png" alt="">
            <h2>Laundry</h2>
        </div>

        <div class="items">
            <li><i class='bx bxs-pie-chart-alt-2'></i><a href="">Dashboard</a></li>
            <li><i class='bx bxs-comment' ></i><a href="">Feedback</a></li> 
        </div>
      </section>
      <section class="interface">
        <div class="navigate">
            <div class="n1">
                <div class="search">
                <i class='bx bx-search-alt' ></i>
                <input type="text" placeholder="search" name="" id="">
                </div>
            </div>
        
            <div class="profile">
                <i class='bx bxs-bell'></i>
                <i class='bx bxs-user-circle' ></i>
             </div>
        </div>
        <h3 class="i-name">Dashboard</h3>
        <div class="values">
          <div class="val-box">
            <i class='bx bxs-user'></i>
            <div>
              <h3>8000</h3>
              <span>New Users</span>
            </div>
          </div>
          <div class="val-box">
            <i class='bx bxs-user'></i>
            <div>
              <h3>8000</h3>
              <span>New Users</span>
            </div>
          </div>
          <div class="val-box">
            <i class='bx bxs-user'></i>
            <div>
              <h3>8000</h3>
              <span>New Users</span>
            </div>
          </div>
          <div class="val-box">
            <i class='bx bxs-user'></i>
            <div>
              <h3>8000</h3>
              <span>New Users</span>
            </div>
          </div>
        </div>
        <div class="board">
          <table width="100%">
            <thead>
                <tr>
                  <td>Customer ID</td>
                  <td>Name</td>
                  <td>UserName</td>
                  <td>Phone NUmber</td>
                  <td>E-mail</td>
                  <td>Address</td>
                </tr>
            </thead>
            <tbody>
                    <?php
                    $query = "SELECT * FROM customer";
                    $result = mysqli_query($connection, $query);

                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row['CustomerID']}</td>";
                        echo "<td>{$row['Name']}</td>";
                        echo "<td>{$row['UserName']}</td>";
                        echo "<td>{$row['PhoneNumber']}</td>";
                        echo "<td>{$row['Email']}</td>";
                        echo "<td>{$row['Address']}</td>";
                        echo "</tr>";
                    }

                    // Close database connection
                    mysqli_close($connection);
                    ?>
                </tbody>
          </table>
        </div>






      </section>
      
  </body>
</html>