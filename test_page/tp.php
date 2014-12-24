<?php
  $word = new COM("word.application") or die("Unable to instantiate Word"); 
  $word->Documents->Open( "H:\Easy2PHP5 build 2\WebSite\a.doc" ); 
  $num_pages = $word->ActiveDocument->ComputeStatistics( $wdStatisticPages );   
  echo $num_pages;
?>