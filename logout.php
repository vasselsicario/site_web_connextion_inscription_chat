<?php
	// Initialiser la session
	session_start();
	
	// Détruire la session.
	if(session_destroy())
	{
		header("Location: login.php"); // Redirection vers login
	}
?>