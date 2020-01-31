<?php
  include('insertdata.php');
  $table="country";
  $field_values=array("country_name","status");
  $data_values=array("usa",'1');
  $sample=Insertdata($table,$field_values,$data_values);
  if($result)
  {
    echo "inserted";
  }
  else
  {
    echo "not inseterd";
  }
?>