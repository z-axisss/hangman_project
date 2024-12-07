<?php
session_start();
unset($_SESSION['word']);
unset($_SESSION['masked_word']);
unset($_SESSION['attempts']);
unset($_SESSION['guessed_letters']);
unset($_SESSION['valid_referrer']);
header("location: home.php");
exit;
?>
