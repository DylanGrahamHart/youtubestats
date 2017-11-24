<?php

function dd($input) {
  die(var_dump($input));
}

function ddj($input) {
  die(json_encode($input));
}

function objToArr($obj) {
  return json_decode(json_encode($obj));
}