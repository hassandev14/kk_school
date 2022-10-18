<?php

if(!function_exists('s'))
{
   function s($arr)
   {
       echo "<pre>";
       print_r($arr);
       echo "</pre>";
   }
}
if(!function_exists('ss'))
{
   function ss($arr)
   {
       echo "<pre>";
       print_r($arr);
       echo "</pre>";
       die;
   }
}