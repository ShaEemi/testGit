<?php

function delete_projet($projet_id)
{
    global $connexion;
    try {
        //on envoie la requete
        $query = $connexion->prepare("DELETE FROM `tpbt_projects` 
                                        WHERE tpbt_projects.id_project = :id_projet");


        //on initialise les paramètres
        $query->bindParam(':id_projet', $projet_id, PDO::PARAM_INT);
       

        //on execute la requete
        $query->execute();

        //fermeture du curseur
        $query->closeCursor();

        //on retourne tous les articles selectionnées
        return true;

    } catch (Exception $e) {
        //fermeture du curseur
        $query->closeCursor();
        return false;
    }
}

