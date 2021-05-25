<?php
// Connexion
function membre_connecte() {
    if (isset($_SESSION['membre'])) {
        return true;
    }
    else {
        header("Location:" . URL . "/connexion");
        return false;
    }
}
function partenaire_connecte() {
    if (isset($_SESSION['membre']) && $_SESSION['membre']['statut'] == 3) {
        return true;
    }
    else {
        header("Location:" . URL . "/connexion");
        return false;
    }
}
function admin_connecte() {
    if (isset($_SESSION['membre']) && $_SESSION['membre']['statut'] == 2) {
        return true;
    }
    else {
        header("Location:" . URL . "/connexion");
        return false;
    }
}
function deconnexion() {
    unset($_SESSION["membre"]);
    header("Location:" . URL . "/connexion");
}

// Panier
function ajouter_produit_panier($id_produit, $titre, $photo, $prix, $quantite) {
    // création du panier
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = array();
        $_SESSION['panier']['id_produit'] = array();
        $_SESSION['panier']['titre'] = array();
        $_SESSION['panier']['photo'] = array();
        $_SESSION['panier']['prix'] = array();
        $_SESSION['panier']['quantite'] = array();
    }
    // verifier et ajouter dans le panier
    $position_produit = array_search($id_produit, $_SESSION['panier']['id_produit']);
    if ($position_produit !== false) {
        $_SESSION['panier']['quantite'][$position_produit] += $quantite;
    }
    else {
        $_SESSION['panier']['id_produit'][] = $id_produit;
        $_SESSION['panier']['titre'][] = $titre;
        $_SESSION['panier']['photo'][] = $photo;
        $_SESSION['panier']['prix'][] = $prix;
        $_SESSION['panier']['quantite'][] = $quantite;
    }
}
function retirer_produit_panier($id_produit) {
    // retirer dans le panier
    $position_produit =  array_search($id_produit, $_SESSION['panier']['id_produit']);
    if ($position_produit !== false) {
        array_splice($_SESSION['panier']['id_produit'], $position_produit, 1);
        array_splice($_SESSION['panier']['titre'], $position_produit, 1);
        array_splice($_SESSION['panier']['photo'], $position_produit, 1);
        array_splice($_SESSION['panier']['prix'], $position_produit, 1);
        array_splice($_SESSION['panier']['quantite'], $position_produit, 1);
    }
}
function augmenter_produit_panier($id_produit, $stock) {
    // augmenter dans le panier
    if (isset($_SESSION['panier'])) {
        $position_produit = array_search($id_produit, $_SESSION['panier']['id_produit']);
        if ($position_produit !== false && $_SESSION['panier']['quantite'][$position_produit] < $stock) {
            $_SESSION['panier']['quantite'][$position_produit]++;
        }
    }
}
function diminuer_produit_panier($id_produit, $stock) {
    // diminuer dans le panier
    if (isset($_SESSION['panier'])) {
        $position_produit = array_search($id_produit, $_SESSION['panier']['id_produit']);
        if ($position_produit !== false && $_SESSION['panier']['quantite'][$position_produit] > 1) {
            $_SESSION['panier']['quantite'][$position_produit]--;
        }
    }
}
function sauvegarder_produits_panier($pdo_object, $etat, $prix_total) {
    // sauvegarder le panier
    if (isset($_SESSION['panier']) && isset($_SESSION['membre'])) {
        // création de la commande
        $pdo_statement = $pdo_object->prepare("SELECT * FROM commande WHERE membre_id = :membre_id AND etat = :etat");
        $pdo_statement->bindValue(':membre_id', $_SESSION['membre']['id_membre'], PDO::PARAM_INT);
        $pdo_statement->bindValue(':etat', htmlspecialchars($etat), PDO::PARAM_STR);
        $pdo_statement->execute();
        $commande_array = $pdo_statement->fetch(PDO::FETCH_ASSOC);
        if (empty($commande_array)) {
            // ajouter
            $pdo_statement_2 = $pdo_object->prepare("INSERT INTO commande (membre_id, prix_total, date, etat) VALUES (:membre_id, :prix_total, :date, :etat)");
        }
        else {
            // mettre à jour
            $pdo_statement_2 = $pdo_object->prepare("UPDATE commande SET membre_id = :membre_id, prix_total = :prix_total, date = :date, etat = :etat WHERE id_commande = :id_commande");
            $pdo_statement_2->bindValue(':id_commande', $commande_array['id_commande'], PDO::PARAM_INT);
            // Supprimer old details_commande
            $pdo_statement_details_commande = $pdo_object->prepare("DELETE FROM details_commande WHERE commande_id = :commande_id");
            $pdo_statement_details_commande->bindValue(":commande_id", $commande_array['id_commande'], PDO::PARAM_INT);
            $pdo_statement_details_commande->execute();
        }
        $pdo_statement_2->bindValue(':membre_id', $_SESSION['membre']['id_membre'], PDO::PARAM_INT);
        $pdo_statement_2->bindValue(':prix_total', htmlspecialchars($prix_total), PDO::PARAM_STR);
        $pdo_statement_2->bindValue(':date', date("Y-m-d"), PDO::PARAM_STR);
        $pdo_statement_2->bindValue(':etat', htmlspecialchars($etat), PDO::PARAM_STR);
        $pdo_statement_2->execute();

        // création des détails de la commande
        $pdo_statement = $pdo_object->prepare("SELECT * FROM commande WHERE membre_id = :membre_id AND etat = :etat");
        $pdo_statement->bindValue(':membre_id', $_SESSION['membre']['id_membre'], PDO::PARAM_STR);
        $pdo_statement->bindValue(':etat', htmlspecialchars($etat), PDO::PARAM_STR);
        $pdo_statement->execute();
        $commande_array = $pdo_statement->fetch(PDO::FETCH_ASSOC);
        for ($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++) {
            $pdo_statement_2 = $pdo_object->prepare("SELECT * FROM details_commande WHERE commande_id = :commande_id AND produit_id = :produit_id");
            $pdo_statement_2->bindValue(':commande_id', $commande_array['id_commande'], PDO::PARAM_INT);
            $pdo_statement_2->bindValue(':produit_id', $_SESSION['panier']['id_produit'][$i], PDO::PARAM_INT);
            $pdo_statement_2->execute();
            $details_commande_array = $pdo_statement_2->fetch(PDO::FETCH_ASSOC);
            if (empty($details_commande_array)) {
                // ajouter
                $pdo_statement_3 = $pdo_object->prepare("INSERT INTO details_commande (commande_id, produit_id, quantite, prix) VALUES (:commande_id, :produit_id, :quantite, :prix)");
            }
            else {
                // mettre à jour
                $pdo_statement_3 = $pdo_object->prepare("UPDATE details_commande SET commande_id = :commande_id, produit_id = :produit_id, quantite = :quantite, prix = :prix WHERE id_details_commande = :id_details_commande");
                $pdo_statement_3->bindValue(':id_details_commande', $details_commande_array['id_details_commande'], PDO::PARAM_INT);
            }
            $pdo_statement_3->bindValue(':commande_id', $commande_array['id_commande'], PDO::PARAM_INT);
            $pdo_statement_3->bindValue(':produit_id', $_SESSION['panier']['id_produit'][$i], PDO::PARAM_INT);
            $pdo_statement_3->bindValue(':quantite', $_SESSION['panier']['quantite'][$i], PDO::PARAM_INT);
            $pdo_statement_3->bindValue(':prix', htmlspecialchars($_SESSION['panier']['prix'][$i]), PDO::PARAM_STR);
            $pdo_statement_3->execute();
        }
    }
}
function maj_session_produits_panier($pdo_object, $etat) {
    // sauvegarder le panier
    if (isset($_SESSION['membre'])) {
        // commande
        $pdo_statement = $pdo_object->prepare("SELECT * FROM commande WHERE membre_id = :membre_id AND etat = :etat");
        $pdo_statement->bindValue(':membre_id', $_SESSION['membre']['id_membre'], PDO::PARAM_STR);
        $pdo_statement->bindValue(':etat', htmlspecialchars($etat), PDO::PARAM_STR);
        $pdo_statement->execute();
        $commande_array = $pdo_statement->fetch(PDO::FETCH_ASSOC);
        if ($commande_array) {
            // details_commande
            $pdo_statement_2 = $pdo_object->prepare("SELECT * FROM details_commande WHERE commande_id = :commande_id");
            $pdo_statement_2->bindValue(':commande_id', $commande_array['id_commande'], PDO::PARAM_INT);
            $pdo_statement_2->execute();
            while ($details_commande_array = $pdo_statement_2->fetch(PDO::FETCH_ASSOC)) {
                if ($details_commande_array) {
                    // Produit
                    $pdo_statement_3 = $pdo_object->prepare("SELECT * FROM produit WHERE id_produit = :id_produit");
                    $pdo_statement_3->bindValue(':id_produit', $details_commande_array['produit_id'], PDO::PARAM_INT);
                    $pdo_statement_3->execute();
                    $produit_array = $pdo_statement_3->fetch(PDO::FETCH_ASSOC);
                    if ($produit_array) {
                        ajouter_produit_panier($produit_array['id_produit'], $produit_array['titre'], $produit_array['photo'], $produit_array['prix'], $details_commande_array['quantite']);
                    }
                }
            }
        }
    }
}

// Visit
function nb_visit_page($pdo_object, $nom_visit_page) {
    // sauvegarder nombre de visit page
    if (!isset($_SESSION['cookie']) || (isset($_SESSION['cookie']) && $_SESSION['cookie'] == "accepter")) {
        // création dashboard
        $pdo_statement = $pdo_object->prepare("SELECT * FROM dashboard WHERE date_visit_page = :date_visit_page AND nom_visit_page = :nom_visit_page");
        $pdo_statement->bindValue(':nom_visit_page', $nom_visit_page, PDO::PARAM_STR);
        $pdo_statement->bindValue(':date_visit_page', date("Y-m-d"), PDO::PARAM_STR);
        $pdo_statement->execute();
        $dashboard_array = $pdo_statement->fetch(PDO::FETCH_ASSOC);
        if (empty($dashboard_array)) {
            // ajouter
            $pdo_statement_2 = $pdo_object->prepare("INSERT INTO dashboard (nom_visit_page, nb_visit_page, date_visit_page) VALUES (:nom_visit_page, :nb_visit_page, :date_visit_page)");
            $pdo_statement_2->bindValue(':nb_visit_page', 1, PDO::PARAM_INT);
        }
        else {
            // mettre à jour
            $pdo_statement_2 = $pdo_object->prepare("UPDATE dashboard SET nb_visit_page = :nb_visit_page WHERE date_visit_page = :date_visit_page AND nom_visit_page = :nom_visit_page");
            $nb_visit_page = $dashboard_array['nb_visit_page'] + 1;
            $pdo_statement_2->bindValue(':nb_visit_page', $nb_visit_page, PDO::PARAM_INT);
        }
        $pdo_statement_2->bindValue(':nom_visit_page', htmlspecialchars($nom_visit_page), PDO::PARAM_STR);
        $pdo_statement_2->bindValue(':date_visit_page', date("Y-m-d"), PDO::PARAM_STR);
        $pdo_statement_2->execute();
    }
}

// Ajouter et retire Favoris
function ajouter_retirer_favoris($pdo_object, $article_id) {
    if (isset($_SESSION['membre']['id_membre'])) {
        $pdo_statement_favoris = $pdo_object->prepare("SELECT * FROM favoris WHERE membre_id = :membre_id AND article_id = :article_id");
        $pdo_statement_favoris->bindValue(':membre_id', $_SESSION['membre']['id_membre'], PDO::PARAM_INT);
        $pdo_statement_favoris->bindValue(':article_id', $article_id, PDO::PARAM_INT);
        $pdo_statement_favoris->execute();
        $favoris_array = $pdo_statement_favoris->fetch(PDO::FETCH_ASSOC);
        if (empty($favoris_array)) {
            // ajouter
            $pdo_statement_favoris = $pdo_object->prepare("INSERT INTO favoris (membre_id, article_id) VALUES (:membre_id, :article_id)");
            $pdo_statement_favoris->bindValue(':membre_id', $_SESSION['membre']['id_membre'], PDO::PARAM_INT);
            $pdo_statement_favoris->bindValue(':article_id', $article_id, PDO::PARAM_INT);
            $pdo_statement_favoris->execute();
        }
        else {
            // Supprimer
            $pdo_statement_favoris = $pdo_object->prepare("DELETE FROM favoris WHERE membre_id = :membre_id AND article_id = :article_id");
            $pdo_statement_favoris->bindValue(':membre_id', $_SESSION['membre']['id_membre'], PDO::PARAM_INT);
            $pdo_statement_favoris->bindValue(':article_id', $article_id, PDO::PARAM_INT);
            $pdo_statement_favoris->execute();
        }
    }
    else {
        return "erreur";
    }
}
?>