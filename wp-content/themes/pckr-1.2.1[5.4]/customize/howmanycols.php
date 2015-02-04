<?php
//How Many Footer Cols
function howmanycols($last = true) {
  $counter = 0;
  if(pckr_option('about_option', 'off' ) == "on") {$counter++;}
  if(pckr_option('joinus_option', 'off' ) == "on") {$counter++;}
  if(pckr_option('partner_option', 'off' ) == "on") {$counter++;}
  $result = 10/$counter;
  switch ($result) {
    case 1:
      $result = "tencol";
      break;
    case 2;
      $result = "fivecol";
      break;
    case 3;
      $result = "threecol"; $lastcol = "fourcol";
      break;
    default:
      $result = "threecol"; $lastcol = "fourcol";
      break;
  }
  if ($last == false && isset($lastcol)) return $lastcol; else return $result;
}
?>