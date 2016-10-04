<?php

function select_projet_to_team($team) {

     global $connexion;
    try {
        //on envoie la requete
        $select = $connexion->prepare('SELECT * FROM tpbt_projects 
            INNER JOIN tpbt_teams 
            ON tpbt_projects.id_team = tpbt_teams.id_team 
            WHERE tpbt_teams.id_team = '.$team);

        //on initialise les paramètres
        //$select->bindParam(':id_team', $team, PDO::PARAM_INT);

        //on execute la requete
        $select->execute();
        
        //on recupere le projet
        $projet_to_team = $select->fetch();

        //fermeture du curseur
        $select->closeCursor();

        //on retourne tous les articles selectionnées
        return $projet_to_team;

    } catch (Exception $e) {
        //fermeture du curseur
        $select->closeCursor();
       
        return false;
    }

}

function delete_user_to_team($user,$team)
{
    global $connexion;
    try {
        //on envoie la requete
        $query = $connexion->prepare("DELETE FROM `tpbt_teams_users` WHERE tpbt_teams_users.id_user = :id_user AND tpbt_teams_users.id_team = :id_team");


        //on initialise les paramètres
        $query->bindParam(':id_user', $user, PDO::PARAM_INT);
        $query->bindParam(':id_team', $team, PDO::PARAM_INT);


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

function delete_user_assin_admin_bug_projet_team($user,$projet)
{
    global $connexion;
    try {
        //on envoie la requete ASSIN
        $query = $connexion->prepare('DELETE FROM `bug_tracker`.`tpbt_bugs` 
                            WHERE tpbt_bugs.id_project = :id_projet  
                            AND tpbt_bugs.users_id_assin = :id_user');


        //on initialise les paramètres
        $query->bindParam(':id_user', $user, PDO::PARAM_INT);
        $query->bindParam(':id_projet', $projet, PDO::PARAM_INT);

        //on execute la requete
        $query->execute();

        //fermeture du curseur
        $query->closeCursor();


        //on envoie la requete ADMIN
        $query = $connexion->prepare('DELETE FROM `bug_tracker`.`tpbt_bugs` 
                            WHERE tpbt_bugs.id_project = :id_projet  
                            AND tpbt_bugs.users_id_admin = :id_user');


        //on initialise les paramètres
        $query->bindParam(':id_user', $user, PDO::PARAM_INT);
        $query->bindParam(':id_projet', $projet, PDO::PARAM_INT);

        //on execute la requete
        $query->execute();

        //fermeture du curseur
        $query->closeCursor();

       
        return true;

    } catch (Exception $e) {
        //fermeture du curseur
        $query->closeCursor();
        return false;
    }
}
