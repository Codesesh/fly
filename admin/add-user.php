<?php



$user = $POST['username'];

if ($user === 'admin') {
	echo 'Cool, you are an admin';
} else {
	echo 'You are not an admin';
}