<?php

$words = $argv;


//going through every word
for($i = 1; $i<count($words); $i++)
{
  //echo $words[$i] . " " . "\n";
  $word_length = strlen($words[$i]);
  $middle_left = (int) floor($word_length/2);

  //wypisz górę diamentu
  for($j = 0; $j<(ceil($word_length/2)); $j++)
  {
    for($k=$j; $k<floor($word_length/2); $k++)
    {
      echo " ";
    }
    $which = $middle_left - $j;
    for($k=0; $k<=$j*2; $k++)
    {
      echo $words[$i][$which];
      $which++;
    }
    echo "\n";
  }

  //wypisz dół diamentu
  $counter = 1;
  for($j = ceil($word_length/2)-2; $j>=0; $j--)
  {
    for($k=$j; $k<floor($word_length/2); $k++)
    {
      echo " ";
    }
    $which = $counter;
    for($k=0; $k<=$j*2; $k++)
    {
      echo $words[$i][$which];
      $which++;
    }
    $counter++;
    echo "\n";
  }
  echo "\n";
}

?>
