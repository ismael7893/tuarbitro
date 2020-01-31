<?php
  include('connection.php');

  function Insertdata($table,$field,$data){

    $field_values= implode(',',$field);
    $data_values=implode(',',$data);

    $sql="INSERT into". " ".$table." ".$field_values. "VALUES(".$data_values.")";
    $result=$conn->query($sql);
  }
?>