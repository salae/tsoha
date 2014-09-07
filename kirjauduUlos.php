<?php
/*
 * Kirjaudutaan ulos sovelluksesta.
 */
session_start();
unset($_SESSION['kirjautunut']);
header('Location: index.php');