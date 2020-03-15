<?php

# regex is always between delimiters, so options can be used -> #my-regex#Options

echo("<h1>preg_match: search in a string</h1><br/>");

# preg_match('regex', 'string') -> boolean
#   return true if regex is found in string
echo ("preg_match(\"#guitare#\", \"J'aime jouer de la guitare.\")<br/>&nbsp;");

if (preg_match("#guitare#", "J'aime jouer de la guitare.")) {
    echo ('vrai');
} else {
    echo ('faux');
}

echo ("<br/><br/>");

# regex ARE case-sensitive !
echo ("preg_match(\"#GUITARE#\", \"J'aime jouer de la guitare.\")<br/>&nbsp;");

if (preg_match("#GUITARE#", "J'aime jouer de la guitare.")) {
    echo ('vrai');
} else {
    echo ('faux');
}

echo ("<br/>Because regex are case-sensitive<br/><br/>");



echo("<h2>Option: i</h2><br/>");

# option: i -> remove the case-sensitiveness of the regex
echo ("preg_match(\"#GUITARE#i\", \"J'aime jouer de la guitare.\")<br/>&nbsp;");

if (preg_match("#GUITARE#i", "J'aime jouer de la guitare.")) {
    echo ('vrai');
} else {
    echo ('faux');
}

echo ("<br/><br/>");




echo("<h2>OR: |</h2><br/>");

echo ("preg_match(\"#guitare|piano#\", \"J'aime jouer de la guitare.\")<br/>&nbsp;");

if (preg_match("#guitare|piano#", "J'aime jouer de la guitare.")) {
    echo ('vrai');
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo ("preg_match(\"#guitare|piano#\", \"J'aime jouer du piano.\")<br/>&nbsp;");

if (preg_match("#guitare|piano#", "J'aime jouer du piano.")) {
    echo ('vrai');
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo ("preg_match(\"#guitare|piano#\", \"J'aime jouer de la flûte.\")<br/>&nbsp;");

if (preg_match("#guitare|piano#", "J'aime jouer de la flûte.")) {
    echo ('vrai');
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo("<h2>Start of string: ^</h2><br/>");

echo ("preg_match(\"#^Bonjour#\", \"Bonjour à tous..\")<br/>&nbsp;");

if (preg_match("#^Bonjour#", "Bonjour à tous.")) {
    echo ('vrai');
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo ("preg_match(\"#^Bonjour#\", \"Je vous souhaite le Bonjour.\")<br/>&nbsp;");

if (preg_match("#^Bonjour#", "Je vous souhaite le Bonjour.")) {
    echo ('vrai');
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo("<h2>End of string: $</h2><br/>");

echo ("preg_match(\"#tous.$#\", \"Bonjour à tous.\")<br/>&nbsp;");

if (preg_match("#tous.$#", "Bonjour à tous.")) {
    echo ('vrai');  # because the last word is "tous."
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo ("preg_match(\"#tous$#\", \"Je vous souhaite le Bonjour.\")<br/>&nbsp;");

if (preg_match("#tous$#", "Je vous souhaite le Bonjour.")) {
    echo ('vrai');
} else {
    echo ('faux');  # because the last word is not "tous." but "tous"
}

echo ("<br/><br/>");

?>