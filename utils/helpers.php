<?php

function redirect($path) {
  header("Location: " . $path);
}

function validPassword($password) {
  return $password == "test";
}

function isLoggedIn() {
	if (isset($_SESSION["auth"])) {
		return $_SESSION["auth"] ? true : false;
	}
	else {
		return false;
	}
  
}
