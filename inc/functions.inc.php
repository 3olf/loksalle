<?php

// Fonction pour debug
function debug($var, $mod = 1) 
{
	echo "<div class='debug'>";
	// Fonction debug_backtrace() qui retourne un array contenant les infos telles que la ligne et le fichier où est executée cette fonction.
	$trace = debug_backtrace();
	// On retire le premier élément de notre array
	$trace = array_shift($trace);
	echo '<p>Debug demandé dans le fichier '.$trace['file'].' à la ligne '.$trace['line'].'</p>';

	// Debug var_dump ou print_r
	if ($mod ==1 ) 
	{
		echo "<pre>"; var_dump($var); echo "</pre>";
	}
	else 
	{
		echo "<pre>"; print_r($var); echo "</pre>";
	}
	echo "</div>";
}


/* FONCTIONS UTILISATEURS */

	// Utilisateur connecté
function userConnected() 
{
	if (isset($_SESSION['utilisateur']))
	{
		return true;
	}
	else 
	{
		return false;
	}
}
	// Utilisateur connecté admin
function userConnectedAdmin() 
{
	if (userConnected() && $_SESSION['utilisateur']['statut'] == 1) 
	{
		return true;
	}
	else 
	{
		return false;
	}
}


// FONCTION CLASSE ACTIVE
function active($url) 
{
	// $_SERVER['PHP_SELF'] => renvoie l'url en cours
	if($_SERVER['PHP_SELF'] == $url) 
	{
		return " class='active' ";
	}
}
