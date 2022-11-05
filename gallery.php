<?php

  class Gallery {


    static public function index ($filename){
      # read JSON into php array
      # called by index.php to populate page
      if(!file_exists($filename)) die('OOPS! File not Found');
      $memorabilia = json_decode(file_get_contents($filename),true);
      $index=0;
      // print_r($quotes);
      foreach ($memorabilia as $bill) {
        echo '<a href="userPages/detail.php?index='.$index.'">'.$bill.'</a><hr />';
        $index++;
      }
    }

    static public function detail ($filename,$index){
      # displays all data stored for index number in JSON file
      if(!file_exists($filename)) die('OOPS! File not Found');
      $memorabilia = json_decode(file_get_contents($filename),true);
      if(isset($memorabilia[$index])) echo $memorabilia[$index];
    }

    static public function create ($filename, $artist, $bill){
      # creates a new entry to the data storage
      if(!file_exists($filename)) die('OOPS! File not Found');
      $memorabilia = json_decode(file_get_contents($filename),true);
      $memorabilia[$artist]=$bill;
      file_put_contents($filename, json_encode($memorabilia));
    }

    static public function edit ($filename,$index,$bill){
      # allows user to edit an entry at a particular index
      if(!file_exists($filename)) die('OOPS! File not Found');
      $memorabilia = json_decode(file_get_contents($filename),true);
      if(isset($memorabilia[$index])){
        $memorabilia[$index]=$bill;
        file_put_contents($filename,json_encode(array_values($memorabilia)));
      }
    }

    static public function delete ($filename,$index){
      if(!file_exists($filename)) die('OOPS! File not Found');
      $memorabilia = json_decode(file_get_contents($filename),true);
      if(isset($memorabilia[$index])){
        unset($memorabilia[$index]);
        file_put_contents($filename,json_encode(array_values($memorabilia)));
      }
    }
  }



 ?>
