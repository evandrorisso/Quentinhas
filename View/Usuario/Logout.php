<?php 
  session_destroy(); // Destrói a sessão limpando todos os valores salvos
  header("Location: http://quentinha.exodoti.xyz/"); exit; // Redireciona o visitante
?>