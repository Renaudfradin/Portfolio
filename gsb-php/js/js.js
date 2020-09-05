function isdanger() {
    const isdanger = "input is-danger";
    return isdanger;
};
function issucces() {
    const issucces = "input is-success";
    return issucces;
};
function controlconnexion() {
    const pseudo = document.getElementById("login1").value;
    const mdp = document.getElementById("mdp1").value;

    if (pseudo.length < 2 || mdp.length < 2) {
        if (pseudo.length < 2 && mdp.length > 2) {
            console.log("1");
            document.getElementById("login1").className = isdanger();
            document.getElementById("mdp1").className = issucces();
            document.getElementById("connexion-erreur").innerHTML = "<p class='help is-danger'>Il manque le pseudo</p>";
        } else if(mdp.length < 2 && pseudo.length > 2){
            console.log("2");
            document.getElementById("login1").className = issucces();
            document.getElementById("mdp1").className = isdanger();
            document.getElementById("connexion-erreur").innerHTML = "<p class='help is-danger'>Il manque  le mot de passe</p>";
        } else if(pseudo.length < 2 && mdp.length < 2){
            console.log("3");
            document.getElementById("login1").className = isdanger();
            document.getElementById("mdp1").className = isdanger();
            document.getElementById("connexion-erreur").innerHTML = "<p class='help is-danger'>Il manque le pseudo est le mot de passe</p>";
        }
    } else {
        document.getElementById("login1").className = issucces();
        document.getElementById("mdp1").className = issucces();
        document.getElementById("connexion-erreur").innerHTML = "<p class='help is-success'>Le formulaire est bien remplie</p>";
    }

}