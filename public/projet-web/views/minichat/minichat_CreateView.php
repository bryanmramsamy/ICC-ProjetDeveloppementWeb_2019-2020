<h2>Poster un message dans le Mini-Chat</h2>

<form method="post" action="index.php?action=minichat_post">



    <div class="form-group">
        Entrez votre message ici :
        <br/>
        <textarea class="form-control" name="message" rows="8" cols="45"></textarea>
        <br/>

        <div class="container">
            <div class="row">
                <div class="col">
                    <input class="btn btn-primary btn-lg btn-block" type="submit" value="Envoyer"/>
                </div>

                <div class="col">
                    <button class="btn btn-secondary btn-lg btn-block" type="reset" value="Éffacer">Reset</button>
                </div>
            </div>
        </div>
         
    </div>

</form>
