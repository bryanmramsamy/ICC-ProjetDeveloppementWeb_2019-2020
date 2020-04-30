<h2 class="text-center">Poster un message dans le Mini-Chat</h2>

<form method="POST" action="index.php?action=minichat_post">
    <div class="form-group">
        <div class="pb-2">
            <label for='message'>Entrez votre message ici :</label>
            <textarea class="form-control" id="message" name="message" rows="4" cols="45"></textarea>
        </div>

        <div class="text-right">
            <input class="btn btn-primary" type="submit" value="Envoyer"/> <button class="btn btn-secondary" type="reset" value="reset">Effacer</button>
        </div>
    </div>
</form>
