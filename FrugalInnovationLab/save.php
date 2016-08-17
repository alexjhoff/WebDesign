<?php
  //createfile function
  //print header (needs name, email, student id, graduation date, track name
  //print transfer fourses (need course and title, institution, grade, units, year completed, equivalent class
  //print courses (calls the next 4 functions (needs associative array of all course, units pairs))
  //print foundation courses
  //prints cse core
  //prints graduate engineering core
  //prints track and additional courses
  //print total units
  
  if(isset($_POST["info"])) {
    $my_file = 'file.txt';
    $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
    $data = 'This is the data';
    fwrite($handle, $data);
    fclose($handle);
  }
  //header('Content-Disposition: attachment; filename=' . filename);
  //readfile(filename);
  exit;
?>
