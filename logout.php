<?php
session_start();

// Destroi todas as variáveis da sessão
session_unset();

// Destroi a sessão
session_destroy();

// Redireciona para a página de login ou outra página após o logout
header("Location: login.php");
exit;
?>
