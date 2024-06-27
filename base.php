<?php

if(!isset ($_SESSION)) /*isset para verificar si algo existe*/
{
    session_start();
}
$conexion = mysqli_connect (
    'localhost',  /*nombre del servidor*/
    'root',       /*nombre de usuario*/
    '',           /*password*/
    'base_academica'     /*nombre de la bd*/
);
?>