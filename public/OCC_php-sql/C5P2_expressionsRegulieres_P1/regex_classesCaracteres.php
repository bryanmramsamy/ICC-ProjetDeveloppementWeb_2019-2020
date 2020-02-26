<?php

echo("<h1>Les classes de caractères</h1><br/>");

echo("<h2>Classe simples</h2>");

echo ("preg_match(\"#gr[ioa]s#\", \"La nuit, tous lec chats sont gris\")<br/>&nbsp;");

if (preg_match("#gr[ioa]s#", "La nuit, tous lec chats sont gris")) {
    echo ('vrai');
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo ("preg_match(\"#gr[ioa]s#\", \"C'est trop gras comme bouffe !\")<br/>&nbsp;");

if (preg_match("#gr[ioa]s#", "C'est trop gras comme bouffe !")) {
    echo ('vrai');
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo ("preg_match(\"#gr[ioa]s#\", \"Je m'appelle grus.\")<br/>&nbsp;");

if (preg_match("#gr[ioa]s#", "Je m'appelle grus.")) {
    echo ('vrai');
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo ("preg_match(\"#^gr[ioa]s#\", \"gros se trouve en début de phrase\")<br/>&nbsp;");

if (preg_match("#^gr[ioa]s#", "gros se trouve en début de phrase")) {
    echo ('vrai');
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo ("preg_match(\"#gr[ioa]s$#\", \"gros se trouve en fin de phrase\")<br/>&nbsp;");

if (preg_match("#gr[ioa]s$#", "gros se trouve en fin de phrase")) {
    echo ('vrai');
} else {
    echo ('faux');
}

echo ("<br/><br/>");



echo("<h2>Intervals de classes</h2>");

echo ("preg_match(\"#[a-z]#\", \"Cette phrase contient une lettre\")<br/>&nbsp;");

if (preg_match("#[a-z]#", "Cette phrase contient une lettre")) {
    echo ('vrai');
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo ("preg_match(\"#[a-z]#\", \"Cette phrase ne contient pas de lettre\")<br/>&nbsp;");

if (preg_match("#[^a-z]#", "Cette phrase ne contient pas de lettre")) {
    echo ('vrai');
} else {
    echo ('faux');  # False: if the ^ is inside the class, it means NOT -> #[^A-Z]#
                    # If the ^ is outside the class, it means beginning of the string -> #^[A-Z]#
}

echo ("<br/><br/>");

echo ("preg_match(\"#[A-Z0-9]#\", \"cette phrase contient des majuscules et des chiffres\")<br/>&nbsp;");

if (preg_match("#[A-Z0-9]#", "cette phrase contient des majuscules et des chiffres")) {
    echo ('vrai');
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo ("preg_match(\"#[A-Z0-9]#\", \"Cette phrase contient au moins 1 chiffre\")<br/>&nbsp;");

if (preg_match("#[A-Z0-9]#", "Cette phrase contient au moins 1 chiffre")) {
    echo ('vrai');
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo ("preg_match(\"#[0-9]#\", \"Cette phrase contient au moins 1 chiffre\")<br/>&nbsp;");

if (preg_match("#[0-9]#", "Cette phrase contient au moins 1 chiffre")) {
    echo ('vrai');
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo ("preg_match(\"#^[0-6]#\", \"6: Cette phrase commence par un chiffre entre 0 et 6\")<br/>&nbsp;");

if (preg_match("#^[0-6]#", "6: Cette phrase commence par un chiffre entre 0 et 5")) {
    echo ('vrai');  # The ^ is outside the interval: means BEGINING
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo ("preg_match(\"#^[0-6]#\", \"7: Cette phrase commence par un chiffre entre 0 et 6\")<br/>&nbsp;");

if (preg_match("#^[0-6]#", "7: Cette phrase commence par un chiffre entre 0 et 6")) {
    echo ('vrai');  # The ^ is outside the interval: means BEGINING
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo ("preg_match(\"#&lt;h[1-6]&gt;#\", \"&lt;h1&gt;Balise HTML titre&lt;/h1&gt;\")<br/>&nbsp;");

if (preg_match("#<h[1-6]>#", "<h1>Balise HTML titre</h1>")) {
    echo ('vrai');  # The ^ is outside the interval: means BEGINING
} else {
    echo ('faux');
}

echo ("<br/><br/>");
?>