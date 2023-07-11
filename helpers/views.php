<?php

use eftec\bladeone\BladeOne;

function blade() 
{
  $views = __DIR__ . '/../resources/views';
  $cache = __DIR__ . '/../cache/blade';
  $blade = new BladeOne($views,$cache,BladeOne::MODE_DEBUG);;
  return $blade;
}