<?php

echo("<h1>Les métacaractères</h1><br/>");

echo ("preg_match(\"#impatient \\!#\", \"Je suis impatient !\")<br/>&nbsp;");

#      # ! ^ $ ( ) [ ] { } ? +* . \ |

if (preg_match("#impatient \!#", "Je suis impatient !")) {
    echo ('vrai');  # Should be true
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo ("preg_match(\"#\\(très\\)#\", \"Je suis (très) fatigué !\")<br/>&nbsp;");

if (preg_match("#\(très\)#", "Je suis (très) fatigué !")) {
    echo ('vrai');  # Should be true
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo ("<h2>Le cas des classes</h2>");

echo ("preg_match(\"#[0-9-\\#\\]]#\", \"hello\")<br/>&nbsp;");

# When metachars are inside the interval, backslash is not needed
# Exceptions: # ] -> [a-z\#\]]
# For - put it after interval -> [a-z-]
if (preg_match("#[0-9-\#\]]#", "hello")) {
    echo ('vrai');
} else {
    echo ('faux');  # Should be false
}

echo ("<br/><br/>");

echo ("preg_match(\"#[0-9-\\#\\]]#\", \"-hello\")<br/>&nbsp;");

if (preg_match("#[0-9-\#\]]#", "-hello")) {
    echo ('vrai');  # Should be true
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo ("preg_match(\"#[0-9-\\#\\]]#\", \"#hello\")<br/>&nbsp;");

if (preg_match("#[0-9-\#\]]#", "#hello")) {
    echo ('vrai');  # Should be true
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo ("preg_match(\"#[0-9-\\#\\]]#\", \"]hello\")<br/>&nbsp;");

if (preg_match("#[0-9-\#\]]#", "]hello")) {
    echo ('vrai');  # Should be true
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo ("preg_match(\"#[0-9-\\#\\]]#\", \"\hello\")<br/>&nbsp;");

if (preg_match("#[0-9-\#\]]#", "\hello")) {
    echo ('vrai');
} else {
    echo ('faux');  # Should be false
}

echo ("<br/><br/>");

echo ("preg_match(\"#[0-9-\\#\\]]#\", \"\\hello\")<br/>&nbsp;");

if (preg_match("#\[0-9-\#\]]#", "\\hello")) {
    echo ('vrai');  # Should be true, is not !
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo ("<h2>Classes abrégées</h2>");

echo ("preg_match(\"#\\d#\", \"Hello 012345\")<br/>&nbsp;");

# \d    There is a number (act as [0-9])
if (preg_match("#\d#", "Hello 012345")) {
    echo ('vrai');  # Should be true
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo ("preg_match(\"#\d#\", \"Hello abcdef\")<br/>&nbsp;");

if (preg_match("#\d#", "Hello abcdef")) {
    echo ('vrai');
} else {
    echo ('faux');  # Should be false
}

echo ("<br/><br/>");

# \D    There is no numbers (act as ^[0-9])
echo ("preg_match(\"#\d#\", \"Hello abcdef\")<br/>&nbsp;");

if (preg_match("#\D#", "Hello abcdef")) {
    echo ('vrai');  # Should be true
} else {
    echo ('faux');
}

echo ("<br/><br/>");

# \w    Alphanumerical character or underscore (act as [a-zA-Z0-9_])
echo ("preg_match(\"#\w#\", \"_\")<br/>&nbsp;");

if (preg_match("#\w#", "_")) {
    echo ('vrai');  # Should be true
} else {
    echo ('faux');
}

echo ("<br/><br/>");

# \W    Non-lphanumerical character or underscore (act as ^[a-zA-Z0-9_])
echo ("preg_match(\"#\W#\", \"_\")<br/>&nbsp;");

if (preg_match("#\W#", "_")) {
    echo ('vrai');
} else {
    echo ('faux');   # Should be false
}

echo ("<br/><br/>");

# \t    Tab
echo ("preg_match(\"#\t#\", \"\t\")<br/>&nbsp;");

if (preg_match("#\t#", "\t")) {
    echo ('vrai');  # Should be true
} else {
    echo ('faux');
}

echo ("<br/><br/>");

# \n    New line
echo ("preg_match(\"#\n#\", \"123\n456\")<br/>&nbsp;");

if (preg_match("#\n#", "123\n456")) {
    echo ('vrai');  # Should be true
} else {
    echo ('faux');
}

echo ("<br/><br/>");

# \r    Back chariot
echo ("preg_match(\"#\r#\", \"123\r456\")<br/>&nbsp;");

if (preg_match("#\r#", "123\r456")) {
    echo ('vrai');  # Should be true
} else {
    echo ('faux');
}

echo ("<br/><br/>");

# \s    White space 
echo ("preg_match(\"#\s#\", \" \")<br/>&nbsp;");

if (preg_match("#\s#", " ")) {
    echo ('vrai');  # Should be true
} else {
    echo ('faux');
}

echo ("<br/><br/>");

# \S    No white space \t \n \r
echo ("preg_match(\"#\S#\", \"\t\")<br/>&nbsp;");

if (preg_match("#\S#", "\t")) {
    echo ('vrai');  # Should be true
} else {
    echo ('faux');
}

echo ("<br/><br/>");

# .     Allows everything except \n
# The option s must be added to count the \n too
echo ("preg_match(\"#.#\", \"dxgerge\")<br/>&nbsp;");

if (preg_match("#.#", "dxgerge")) {
    echo ('vrai');  # Should be true
} else {
    echo ('faux');
}

echo ("<br/><br/>");

echo ("preg_match(\"#\.#s\", \"dxgerge\n\")<br/>&nbsp;");

if (preg_match("#\.#s", "dxgerge\n")) {
    echo ('vrai');  # Should be true
} else {
    echo ('faux');
}
?>