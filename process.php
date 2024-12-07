<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $letter = strtolower($_POST['letter']);

    // Validate input
    if (ctype_alpha($letter) && strlen($letter) == 1 && !in_array($letter, $_SESSION['guessed_letters'])) {
        $_SESSION['guessed_letters'][] = $letter;

        if (strpos($_SESSION['word'], $letter) !== false) {
            // Correct guess
            $word = $_SESSION['word'];
            $masked_word = $_SESSION['masked_word'];

            for ($i = 0; $i < strlen($word); $i++) {
                if ($word[$i] == $letter) {
                    $masked_word[$i] = $letter;
                }
            }

            $_SESSION['masked_word'] = $masked_word;

            // Check if the word is completely guessed
            if ($masked_word == $word) {
                $_SESSION['valid_referrer'] = true;
                echo "<script>
                        window.location.href = 'win.php';
                      </script>";
                exit();
            }
        } else {
            // Incorrect guess
            $_SESSION['attempts']--;

            if ($_SESSION['attempts'] <= 0) {
                $_SESSION['valid_referrer'] = true;
                echo "<script>window.location.href = 'gameover.php';</script>";
            }
        }
    }
    echo "<script>window.location.href = 'home.php';</script>";
    exit();
}
?>
