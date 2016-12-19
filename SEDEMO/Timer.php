<?php
// countdown function
// parameters: (year, month, day, hour, minute)
countdown(2010,1,1,0,0);

function countdown($year, $month, $day, $hour, $minute)
{
  // make a unix timestamp for the given date
  $the_countdown_date = mktime($hour, $minute, 0, $month, $day, $year, -1);

  // get current unix timestamp
  $today = time();
  echo "string123";
  $difference = $the_countdown_date–$today;
  if ($difference < 0) $difference = 0;

  $days_left = floor($difference/60/60/24);
  $hours_left = floor(($difference – $days_left*60*60*24)/60/60);
  $minutes_left = floor(($difference – $days_left*60*60*24 – $hours_left*60*60)/60);
  // OUTPUT
  echo “Today’s date “.date(“F j, Y, g:i a")."<br/>";
  echo “Countdown date “.date(“F j, Y, g:i a",$the_countdown_date)."<br/>";
  echo “Countdown “.$days_left." days “.$hours_left." hours “.$minutes_left." minutes left";
}
?>
