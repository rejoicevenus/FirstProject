<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
          crossorigin="anonymous">
          <script src="jquery.man.js"type="text/javascript"></script>
    <title>User Dashboard</title>
</head>
<style type="text/css">
    body {
    width: 800px;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    padding: 0px;
    margin: 0px auto;

}
.frm{
    border: 1px solid #7dda;
    background-color: #b4c8d0;
    margin: 0 px auto;
    padding: 40px;
    border-radius: 18px;
}
.InputBox{
    padding: 10px;
    border: #bdbdbd 1px solid;
    border-radius: 9px;
    background-color: #fff;
    width: 100%;
}
.row{
    padding-bottom: 15px;
    padding-left: 150px;
}
</style>
<body>
    <div class="container mt-5">
        <h1>Welcome to Optimum House Hunting System</h1>
        <form>
</form>
            <a href="logout.php" class="btn btn-warning">logout</a>
</div>
<?php
    include_once 'config.php';
    $query = "SELECT * FROM housetype"; // Add semicolon to close SQL query
    $result = $db->query($query);
?>
<div class="frm">
    <h2>Choose your House!</h2>
    <div class="row">
        <label>HouseType</label><br>
        <select name="housetype" id="housetype" class="InputBox" onChange="FetchLocation (this.value);">
            <option value="">Select Housetype</option> <!-- Add empty value for default option -->
            <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { // Add opening curly brace
                        echo '<option value="'.$row["id"].'">'.$row["Type"].'</option>';
                        
                    }
                }
            ?>
        </select>
    </div>
</div>
          <script type="text/javascript">
          function FetchLocation(id){
    $.ajax({
        type: "POST",
        url: "ajaxdata.php",
        data: {'housetype_id': id},
        success: function(data) {
            $("#location").html(data);
        }
    }
    );
}
         </script>
        </select>
      </div>
      </div>
      <div class="frm">
      <div class="row">
        <label>HouseLocation</label><br>
        <select name="houselocation" id="houselocation" class="InputBox" onChange="FetchSize(this.value);" required>
            <option value =""> Select HouseLocation</option>
            <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { // Add opening curly brace
                        echo '<option value="'.$row["id"].'">'.$row["Location"].'</option>';
                    }
                }
            ?>
        </select>
      </div>
          <script type="text/javascript">
          function FetchSize(id) {
    $.ajax({
        type: "POST",
        url: "ajaxdata.php",
        data: {'houselocation_id': id},
        success: function(data) {
            $("#size").html(data);
        }
    });
          }
         </script>
      <div class="frm">
      <div class="row">
        <label>HouseSize</label><br>
        <select name="housesize" id="housesize" class="InputBox" onChange="Fetchprice(this.value);" required>
            <option value > Select Housesize</option>
            <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { // Add opening curly brace
                        echo '<option value="'.$row["id"].'">'.$row["Size"].'</option>';
                    }
                }
            ?>
        </select>
      </div>
      </div>
      <script type="text/javascript">
          function Fetchprice(id) {
    $.ajax({
        type: "POST",
        url: "ajaxdata.php",
        data: {'housesize_id': id},
        success: function(data) {
            $("#size").html(data);
        }
    });
}
      <div class="frm">
      <div class="row">
        <label>HousePrice</label><br>
        <select name="housetype" id="houseprice" class="InputBox"onChange="FetchPrice(this.value);" required>
            <option value > Select Houseprice</option>
        </select>

      </div>
      </div>
         
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-md-12">
                    <!-- Dashboard content goes here -->
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS CDN -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" 
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" 
            crossorigin="anonymous"></script>
</body>
</html>
