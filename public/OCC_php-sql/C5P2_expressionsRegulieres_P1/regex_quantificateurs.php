<?php

echo("<h1>Les quantificateurs</h1><br/>");

echo("<h2>Symboles courants: ? + *</h2>");
echo("<h3>?: caractère facultatif: peut apparaite 0 ou 1 fois</h3>");

echo ("preg_match(\"#u?#\", \"ooooooo\")<br/>&nbsp;");

if (preg_match("#u?#", "ooooooo")) {
    echo ('vrai');  # true: there is no 'u' or only one 'u'
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo ("preg_match(\"#u?#\", \"oooouooo\")<br/>&nbsp;");

if (preg_match("#u?#", "oooouooo")) {
    echo ('vrai');  # true: there is no 'u' or only one 'u'
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo ("preg_match(\"#u?#\", \"oouooouoo\")<br/>&nbsp;");

if (preg_match("#u?#", "oouooouoo")) {
    echo ('vrai');  # true: there is no 'u' or only one 'u'
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo ("preg_match(\"#u?#\", \"oouuuoo\")<br/>&nbsp;");

if (preg_match("#u?#", "oouuuoo")) {
    echo ('vrai');
} else {
    echo ('faux');  # false: more than one 'u'
}

echo ("<br/><br/>");

echo("<h3>+: caractère obligatoire: peut apparaite 1 ou plusieurs fois</h3>");

echo ("preg_match(\"#u+#\", \"oooo\")<br/>&nbsp;");

if (preg_match("#u+#", "oooo")) {
    echo ('vrai');
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo ("preg_match(\"#u+#\", \"oouoo\")<br/>&nbsp;");

if (preg_match("#u+#", "oouoo")) {
    echo ('vrai');
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo ("preg_match(\"#u+#\", \"uuu\")<br/>&nbsp;");

if (preg_match("#u+#", "uuu")) {
    echo ('vrai');
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo("<h3>*: caractère facultatif et répétitif: peut apparaitre 0, 1 ou plusieurs fois</h3>");

echo ("preg_match(\"#u*#\", \"oooo\")<br/>&nbsp;");

if (preg_match("#u*#", "oooo")) {
    echo ('vrai');
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo ("preg_match(\"#u+#\", \"oouoo\")<br/>&nbsp;");

if (preg_match("#u*#", "oouoo")) {
    echo ('vrai');
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo ("preg_match(\"#u*#\", \"uuu\")<br/>&nbsp;");

if (preg_match("#u*#", "uuu")) {
    echo ('vrai');
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo ("<h3>Autres exemples en combinant des classes</h3>");

echo ("preg_match(\"^Bla(bla)*$#\", \"Blablablabla\")<br/>&nbsp;");

if (preg_match("#^Bla(bla)*$#", "Blablablabla")) {
    echo ('vrai');
} else {
    echo ('faux');
}

echo ("<br/><br/>");


echo("Les accolades");

echo ("preg_match(\"#(ba){3}#\", \"zybababadc\")<br/>&nbsp;");

if (preg_match("#(ba){3}#", "zybababadc")) {
    echo ('vrai'); 
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo ("preg_match(\"#(ba){3,5}#\", \"zybabababadc\")<br/>&nbsp;");

if (preg_match("#(ba){3,5}#", "zybabababadc")) {
    echo ('vrai'); 
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo ("preg_match(\"#(ba){3,5}#\", \"zybabababababadc\")<br/>&nbsp;");

if (preg_match("#(ba){3,5}#", "zybabababababadc")) {
    echo ('vrai'); 
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo ("preg_match(\"#(ba){3,5}#\", \"zybabadc\")<br/>&nbsp;");

if (preg_match("#(ba){3,5}#", "zybabadc")) {
    echo ('vrai');
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo ("preg_match(\"#(ba){3,}#\", \"zybababababababababababadc\")<br/>&nbsp;");

if (preg_match("#(ba){3,}#", "zybababababababababababadc")) {
    echo ('vrai');  # true: there is no 'u' or only one 'u'
} else {
    echo ('faux');
}

echo ("<br/><br/>");

?>