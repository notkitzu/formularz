<?php


$baza = mysqli_connect("localhost", "root", "", "samochody");
if (mysqli_connect_errno())  die( "Blad: ".mysqli_connect_error() );
mysqli_set_charset($baza,"utf8");