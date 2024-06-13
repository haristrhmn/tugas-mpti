<?php
require_once 'controller.php';

session_start();
if(session_destroy()) // Menghapus Sessions
{
	header("location:signin.php"); // Langsung mengarah ke Home index.php
}
?>