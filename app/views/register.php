<form method="POST" action="/register">
    <input type="text" name="nom" placeholder="Nom" required>
    <input type="password" name="mot_de_passe" placeholder="Mot de passe" required>
    <input type="email" name="mail" placeholder="Email" required>
    <select name="type">
        <option value="type1">Diabète Type 1</option>
        <option value="type2">Diabète Type 2</option>
    </select>
    <input type="radio" name="gender" value="male"> Homme
    <input type="radio" name="gender" value="female"> Femme
    <button type="submit" name="submit">S'inscrire</button>
</form>
