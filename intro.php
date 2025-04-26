<?php  

  // This file is for instructor use ONLY, students will follow
  // along as the instructor types and explains this code.

  //STUDENTS WILL HAVE CODE HERE FROM LESSON 1
  echo '<br />';

  //CREATING AND PRINTING AN INDEXED ARRAY
  $numberArray = [5,6,7,8,9,10];
  print_r($numberArray);

  //USING A FOREACH LOOP TO LOOP THROUGH AN ARRAY
  foreach($numberArray as $number){
    $number++;
    echo "$number ";
  }

  foreach($numberArray as $num){
    $num = 0;
    echo "$num ";
  }
  echo '<br />';

  //CREATING AND PRINTING AN ASSOCIATIVE ARRAY
  $associativeArray = ['name'=>'Robert', 'id'=>'10928', 'coffee'=>'express'];
  print_r($associativeArray);
  echo '<br />';

  //CREATING AND PRINTING A MULTIDIMENSIONAL ASSOCIATIVE ARRAY
  $multiArray = [
    ['id'=>'1', 'name'=>'John', 'coffee'=>'medium roast'],
    ['id'=>'2', 'name'=>'Zack', 'coffee'=>'light roast'],
    ['id'=>'3', 'name'=>'Nick', 'coffee'=>'dark roast'],
  ];
  print_r($multiArray);
  echo '<br />';
  foreach($multiArray as $singleArray){
    print_r($singleArray);
    echo '<br />';
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
</body>
</html>