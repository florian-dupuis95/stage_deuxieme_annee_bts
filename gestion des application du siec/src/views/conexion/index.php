
<form class="connexion" action="index.php?action=login" method="post">
    <h2>Connexion</h2><br/>
    <div class="row mb-3">
        <div class="col-lg-2">
            <input class="form-control " type="text" placeholder="trigramme" name="pseudo" required> <br/>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-2">
            <input class="form-control" type="password" placeholder="mot de passe" name="psw" required><br/><br/>
        </div>
    </div>
    <button type="submit" class="btn btn-danger" >connexion</button>
</form>