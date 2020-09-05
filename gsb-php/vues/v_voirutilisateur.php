<div class = "block">
<div class = "container">
    <div class="field is-grouped is-grouped-centered">
        <h3 class = "title is-3">TOUS LES UTILISATEURS</h3>
    </div>
    <table class = "table is-bordered" id = "tableauetatforfais">
        <tr>
            <td>ID  </td>
            <td>NOM  </td>
            <td>PRENOM  </td>
            <td>LOGIN  </td>
            <td>ADRESSE  </td>
            <td>CP  </td>
            <td>VILLE  </td>
            <td>DATEEMBAUCHE  </td>
            <td>STATU-ID  </td>
            <td>      </td>
            <td>      </td>
        </tr>
        <?php
            foreach ($lesinfosvisi as $info) {
            $id =  $info['id'];
            $nom =  $info['nom'];
            $prenom =  $info['prenom'];
            $login =  $info['login'];
            $adresse =  $info['adresse'];
            $cp =  $info['cp'];
            $ville =  $info['ville'];
            $dateembauche =  $info['dateEmbauche'];
            $statuid =  $info['statu-id'];
        ?>
        <tr>
            <td><?= $id ?></td>
            <td><?= $nom ?></td>
            <td><?= $prenom ?></td>
            <td><?= $login ?></td>
            <td><?= $adresse ?></td>
            <td><?= $cp ?></td>
            <td><?= $ville ?></td>
            <td><?= $dateembauche ?></td>
            <td><?= $statuid ?></td>
            <td><a href="index.php?uc=modifcompte&action=modifcompte&id=<?= $id ?>"><button><img src="vues/b_edit.png" alt=""></button></a></td>
            <td><a href="index.php?uc=voirutilisateur&action=suprimmercompte&id=<?= $id ?>"><button><img src="vues/b_drop.png" alt="" ></button></a></td>
        </tr>   
        <?php } ?>    
    </table>
</div>
</div>
