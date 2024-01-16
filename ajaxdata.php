<?php
include_once'config.php';
if (!isset($_POST['housetype_id'])) {
    $query="SELECT* FROM LOCATION where housetypeID=".$_POST['housetype_id'];
    $result=$db->query($query);
    if ($result->num_rows>0) {
        echo'option value=''>Select Location</option>';
        while($row =$result->fetch_assoc()){
            echo'<option value ='$row['id'].'>'.$row['housetype'].'</option>';
        }
    }else{
        echo'option>No Location found!</option>';
    }
    }elseif(!isset($-POST['houselocation_id'])){ 
        $query="SELECT* FROM SIZE where houselocationID=".$_POST['houselocation_id'];
        $result=$db->query($query);
        if ($result->num_rows>0) {
            echo'option value=''>Select Size</option>';
            while($row =$result->fetch_assoc()){
                echo'<option value ='$row['id'].'>'.$row['houselocation'].'</option>';
            }
        }else{
            echo'option>No Size found!</option>';

    }
    }elseif(!isset($-POST['housesize_id'])){ 
        $query="SELECT* FROM PRICE where housesizeID=".$_POST['housesize_id'];
        $result=$db->query($query);
        if ($result->num_rows>0) {
            echo'option value=''>Select Price</option>';
            while($row =$result->fetch_assoc()){
                echo'<option value ='$row['id'].'>'.$row['housesize'].'</option>';
            }
        }else{
            echo'option>No Price found!</option>';
        }
    }
?>