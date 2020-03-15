<h1>Parenthèses capturantes</h1>

<p>
    <?php
    if (isset($_POST['texte'])) {
        $texte = stripslashes($_POST['texte']);  # Remove automatically add slashes
        $texte = htmlspecialchars($texte);  # Prevent html-interpretation in user input        
        $texte = nl2br($texte);  # Replace line breaks by <br/> in order to keep line breaks

        # Coloration of html code
        $texte = preg_replace('#<[a-z0-9]+>.*</[a-z0-9]+>#', '<span style="color:green">$0</span>', $texte);

        # preg_replace('#regex#', 'replacement_text', 'text_in_which_search_is_made')
            # Option i = accept capital [B] as well as [b]
            # Option s = . accepts line breaks
            # Option U = Ungreedy option: accept more than one [b] in the text # TODO: to develop
        $texte = preg_replace('#\[b\](.+)\[/b\]#isU', '<strong>$1</strong>', $texte);
        # In regex, every bracket defines an argument.
        # Here, the whole regex is argument $0. The (.+) is argument $1.

        # In the case of:
            # $var = preg_replace('#(anti)co(?:nsti)(tu(tion)nelle)ment#', '...', $var);
        # $0 = anticonstitutionnellement -> ALWAYS created
        # $1 = anti
        # $2 = tutionnelle
        # $3 = tion
            # Because of the ?:, the (nsti) is ignored by the preg_replace()

        # [i][/i]
        $texte = preg_replace('#\[i\](.+)\[/i\]#isU', '<em>$1</em>', $texte);

        # [color=red][/color]
        $texte = preg_replace('#\[color=(red|green|blue|yellow|purple|olive)\](.+)\[/color\]#isU', '<span style="color:$1">$2</span>', $texte);
        # $0 = whole regex
        # $1 = red|green|blue|yellow|purple|olive
        # $2 = .+

        # transform http:// links in clickable links
        $texte = preg_replace('#https?://[a-z0-9-_/=&.\?]+#i', '<a href="$0">$0</a>', $texte);

        # Transform mails into mailto: links
        $texte = preg_replace('#[a-z0-9.-_]+@[a-z0-9.-_]{2,}\.[a-z]{2,4}#i', '<a href="mailto:$0">$0</a>', $texte);


        echo ($texte);
    }
    ?>
</p>

<form method='post'>
    <p>
        <textarea id="texte" name="texte" rows="8" cols="45">Accepte les BB-code: [b] pour mettre le texte en gars [/b], [i] pour mettre le texte en italic [/i], [color=red] pour mettre le texte en rouge [/color], [color=blue] pour mettre le texte en blue [/color] et accepte aussi green, yellow, purple et olive. Vous pouvez aussi entrer des liens http://monLien.com ou https://monLien.com?page=1&skin=blue ou encore des adresse mail comme mon.mail@mondomaine.dom &lt;test&gt;blablabla&lt;/test&gt;</textarea>
        <input type='submit' value="Soumettre texte" />
    </p>
</form>