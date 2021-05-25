<?php
require_once("include/init.php");
require_once("include/fonctions.php");
require_once("vendor/autoload.php");

// Vérifie Membre
if (isset($_SESSION['membre'])) {
    // Vérifie panier
    $pdo_statement = $pdo_object->prepare("SELECT * FROM commande WHERE membre_id = :membre_id AND etat = :etat");
    $pdo_statement->bindValue(":membre_id", $_SESSION['membre']['id_membre'], PDO::PARAM_INT);
    $pdo_statement->bindValue(':etat', "panier", PDO::PARAM_STR);
    $pdo_statement->execute();
    $commande_array = $pdo_statement->fetch(PDO::FETCH_ASSOC);
    if ($commande_array) {
        // Prix
        $prix = $commande_array['prix_total'] * 100;
    
        // Stripe
        $key = require_once('stripe-config.php');
        
        Stripe\Stripe::setApiKey($key['key']);
        
        Stripe\Customer::create(array(
            "description" => "Client id: " . $_SESSION['membre']['id_membre'],
            "email" => $_SESSION['membre']['email']
        ));
        
        $charge = Stripe\Charge::create(array(
            "amount" => $prix,
            "currency" => "eur",
            "source" => $_POST['stripeToken'],
            "description" => "Client de Dating Paris, commande id: " . $commande_array['id_commande'],
        ));
        
        // echo '<pre>'; print_r($charge->values()); echo '</pre>';
        $info = $charge->values();
    
        if ($info[43] == "succeeded") {
            // Valider
            $pdo_statement_2 = $pdo_object->prepare("UPDATE commande SET etat = :etat, date = :date WHERE id_commande = :id_commande");
            $pdo_statement_2->bindValue(":id_commande", $commande_array['id_commande'], PDO::PARAM_INT);
            $pdo_statement_2->bindValue(':etat', "payer", PDO::PARAM_STR);
            $pdo_statement_2->bindValue(':date', date("Y-m-d"), PDO::PARAM_STR);
            $pdo_statement_2->execute();
            unset($_SESSION["panier"]);
            header("Location:" . URL . "/paiement?validation=oui");
        }
        else {
            header("Location:" . URL . "/paiement?validation=non");
        }
    }
    else {
        header("Location:" . URL . "/panier?erreur=vide");
    }
}
else {
    header("Location:" . URL . "/connexion");
}
?>