<?php 
    if (isset($_POST['fp_submit'])) {
        update_option( 'fp_content', $_POST['fp_content'] );
        update_option( 'fp_activation', $_POST['fp_activation'] );
    }
?>
 
<div id="fp_admin" class="wrap">
    <!-- Title display -->
    <h1>
        <?php echo get_admin_page_title(); ?>
    </h1>
 
    <h3> Entrer ci-dessous les paramètres du formulaire</h3>
 
    <!-- Creation form -->
    <form action="<?php $_SERVER['REQUEST_URI']; ?>" method="post" name="fp_plugin">
 
        <!-- Champ contenu de la bannière -->
        <fieldset>
            <legend>Ecrire le contenu de la bannière</legend>
            <input type="text" name="fp_content" value="<?php echo (stripslashes(get_option('fp_content'))) ?> ">
        </fieldset>
 
        <br>
 
        <!-- Champ activation -->
        <fieldset>
            <legend>Activer la bannière</legend>
            <input type="checkbox" name="fp_activation" id="fp_activation" <?php checked( get_option('fp_activation'), 'on') ?>>
            <label for="fp_activation_yes">Oui</label>
        </fieldset>
 
        <br>
 
        <!-- Bouton de validation du formulaire -->
 
        <input type="submit" value="Envoyer" name='fp_submit'>
     
    </form>
</div>