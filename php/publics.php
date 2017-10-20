<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 10/13/2017
 * Time: 5:55 AM
 */
function getDBConnection(){
    $connection=new mysqli("localhost","seyedali_fzl","Seyed619021","seyedali_personal");
    if($connection->connect_error)
        return null;
    else{
        mysqli_query($connection,"set names utf8");
        return $connection;
    }
}
function check_data($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}