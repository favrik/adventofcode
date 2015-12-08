<?php

function has_required_vowels($letters) {
  $vowels = str_split('aeiou');
  $vowels_in_string = array_intersect($letters, $vowels);

  if (count($vowels_in_string) >= 3) {
    return true;
  }

  return false;
}

function does_not_include_substrings($letters) {
  for ($i = 0; $i < count($letters); $i++) {
    if ($i == count($letters) - 1) {
      break;
    }

    $pair = $letters[$i] . $letters[$i + 1];
    if (in_array($pair, array('ab', 'cd', 'pq', 'xy'))) {
      return false;
    }
  }

  return true;
}

function has_repeated_letter($letters) {
  for ($i = 0; $i < count($letters); $i++) {
    if ($i == count($letters) - 1) {
      break;
    }

    if ($letters[$i] == $letters[$i + 1]) {
      return true;
    }
  }

  return false;
}


// Program 1
$strings = file('day-5.input');

$nice_1 = 0;
foreach ($strings as $string) {
  $letters = str_split($string);
  if (has_required_vowels($letters) && has_repeated_letter($letters) && does_not_include_substrings($letters)) {
    $nice_1 += 1;
  }
}

echo $nice_1;

// Program 2

function repeats_with_middle($letters) {
  for ($i = 0; $i < count($letters); $i++) {
    if ($i == count($letters) - 2) {
      break;
    }

    if ($letters[$i] == $letters[$i + 2]) {
      return true;
    }
  }

  return false;
}

function d($value) { echo $value . "\n"; }

function contains_pair($letters) {
 for ($i = 0; $i < count($letters); $i++) {
    if ($i == count($letters) - 2) {
      break;
    }


    $pair = $letters[$i] . $letters[$i + 1];
    for ($x = $i + 2; $x < count($letters); $x++) {
      $next_pair = $letters[$x] . $letters[$x + 1];
      if ($pair == $next_pair) {
        return true;
      }
    }
  }

  return false;

}

$nice_2 = 0;
foreach ($strings as $string) {
  $letters = str_split($string);
  if (repeats_with_middle($letters) && contains_pair($letters)) {
    $nice_2 += 1;
  }
}

echo "\n", $nice_2;
