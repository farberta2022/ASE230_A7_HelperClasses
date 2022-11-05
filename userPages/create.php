<?php
  //create.php for The Wall
  if(count($_POST)){
    require_once('../gallery.php');
    Gallery::create('../data/gallery.json', $_POST['artist'], $_POST['memory']);
  }

 ?>

 <form method="post">
   <input type="text" name="artist" /><input type="text" name="memory" /> <b />
   <button type="submit" name="submit">Submit</button>

 </form>
