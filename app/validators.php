<?php

//Custom Validators
    Validator::extend('alpha_space', function($attr, $value) {
  	 return preg_match('/^([a-z ])+$/i', $value);
  	 });

  	 Validator::extend('foldername', function($attr, $value) {
  	 return strpbrk($value,".\\/?*#:|\"<>") ? false : true;
  	 });



