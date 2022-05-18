<?php

require __DIR__ . '/db.php';

class CRUD
{

    protected $db;

    function __construct()
    {
        $this->db = DB();
    }

    function __destruct()
    {
        $this->db = null;
    }

    /*
     * Add new Record
     *
     * @param $num_visiteur
     * @param $nom
     * @param $adresse
     * @return $mixed
     * */
    public function Create($num_visiteur, $nom, $adresse)
    {
        $query = $this->db->prepare("INSERT INTO visiteur(num_visiteur, nom, adresse) VALUES (:num_visiteur,:nom,:adresse)");
        $query->bindParam("num_visiteur", $num_visiteur, PDO::PARAM_STR);
        $query->bindParam("nom", $nom, PDO::PARAM_STR);
        $query->bindParam("adresse", $adresse, PDO::PARAM_STR);
        $query->execute();
        return $this->db->lastInsertId();
    }

    /*
     * Read all records
     *
     * @return $mixed
     * */
    public function Read()
    {
        $query = $this->db->prepare("SELECT * FROM visiteur ORDER BY visiteur.num_visiteur ASC");
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    /*
     * Delete Record
     *
     * @param $user_id
     * */
    public function Delete($user_id)
    {
        $query = $this->db->prepare("DELETE FROM visiteur WHERE id = :id");
        $query->bindParam("id", $user_id, PDO::PARAM_STR);
        $query->execute();
    }

    /*
     * Update Record
     *
     * @param $num_visiteur
     * @param $nom
     * @param $adresse
     * @return $mixed
     * */
    public function Update($num_visiteur, $nom, $adresse, $user_id)
    {
        $query = $this->db->prepare("UPDATE visiteur SET num_visiteur = :num_visiteur, nom = :nom, adresse = :adresse  WHERE id = :id");
        $query->bindParam("num_visiteur", $num_visiteur, PDO::PARAM_STR);
        $query->bindParam("nom", $nom, PDO::PARAM_STR);
        $query->bindParam("adresse", $adresse, PDO::PARAM_STR);
        $query->bindParam("id", $user_id, PDO::PARAM_STR);
        $query->execute();
    }

    /*
     * Get Details
     *
     * @param $user_id
     * */
    public function Details($user_id)
    {
        $query = $this->db->prepare("SELECT * FROM visiteur WHERE id = :id");
        $query->bindParam("id", $user_id, PDO::PARAM_STR);
        $query->execute();
        return json_encode($query->fetch(PDO::FETCH_ASSOC));
    }

    public function Search()
    {
        $query = $this->db->prepare("SELECT visiteur.nom,date_visite,tarif_jrs,nbjrs,(SELECT tarif_jrs*nbjrs) as Montant FROM  site,visiteur,visiter WHERE visiteur.num_visiteur = visiter.num_visiteur AND site.num_site = visiter.num_site ORDER BY visiteur.nom");
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    public function Chercher($site,$date1,$date2)
    {
        $query = $this->db->prepare("SELECT visiteur.nom,date_visite,tarif_jrs,nbjrs,(SELECT tarif_jrs*nbjrs) as Montant FROM  site,visiteur,visiter WHERE visiteur.num_visiteur = visiter.num_visiteur AND visiter.num_site = site.num_site AND site.nom = :site AND date(date_visite) between :date1 and :date2");
        $query->bindParam("site", $site, PDO::PARAM_STR);
        $query->bindParam("date1", $date1, PDO::PARAM_STR);
        $query->bindParam("date2", $date2, PDO::PARAM_STR);
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    public function Search_visite_site()
    {
        $query = $this->db->prepare("select site.nom as Site,(select sum(nbjrs)) as Effectif,(select sum(tarif_jrs*nbjrs)) as Total from site,visiter where site.num_site=visiter.num_site group by site.nom");
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    public function Chercher_visite_site($site,$annee,$mois,$date1,$date2)
    {
        $query = $this->db->prepare("select site.nom as Site,(select sum(nbjrs)) as Effectif,(select sum(tarif_jrs*nbjrs)) as Total from site,visiter where site.num_site = visiter.num_site and site.nom = :site and year(date_visite) = :annee and month(date_visite) = :mois and date(date_visite) between :date1 and :date2");
        $query->bindParam("site", $site, PDO::PARAM_STR);
        $query->bindParam("annee", $annee, PDO::PARAM_STR);
        $query->bindParam("mois", $mois, PDO::PARAM_STR);
        $query->bindParam("date1", $date1, PDO::PARAM_STR);
        $query->bindParam("date2", $date2, PDO::PARAM_STR);
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    public function Chercher_visite_site_by_date($site,$date1,$date2)
    {
        $query = $this->db->prepare("select site.nom as Site,(select sum(nbjrs)) as Effectif,(select sum(tarif_jrs*nbjrs)) as Total from site,visiter where site.num_site = visiter.num_site and site.nom = :site and date(date_visite) between :date1 and :date2");
        $query->bindParam("site", $site, PDO::PARAM_STR);
        $query->bindParam("date1", $date1, PDO::PARAM_STR);
        $query->bindParam("date2", $date2, PDO::PARAM_STR);
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    public function Chercher_visite_site_global($site,$annee,$mois)
    {
        $query = $this->db->prepare("select site.nom as Site,(select sum(nbjrs)) as Effectif,(select sum(tarif_jrs*nbjrs)) as Total from site,visiter where site.num_site = visiter.num_site and site.nom = :site and year(date_visite) = :annee and month(date_visite) = :mois");
        $query->bindParam("site", $site, PDO::PARAM_STR);
        $query->bindParam("annee", $annee, PDO::PARAM_STR);
        $query->bindParam("mois", $mois, PDO::PARAM_STR);
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    public function Chercher_visite_site_by_year($site,$annee)
    {
        $query = $this->db->prepare("select site.nom as Site,(select sum(nbjrs)) as Effectif,(select sum(tarif_jrs*nbjrs)) as Total from site,visiter where site.num_site = visiter.num_site and site.nom = :site and year(date_visite) = :annee");
        $query->bindParam("site", $site, PDO::PARAM_STR);
        $query->bindParam("annee", $annee, PDO::PARAM_STR);
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    public function Chercher_visite_site_by_month($site,$mois)
    {
        $query = $this->db->prepare("select site.nom as Site,(select sum(nbjrs)) as Effectif,(select sum(tarif_jrs*nbjrs)) as Total from site,visiter where site.num_site = visiter.num_site and site.nom = :site and month(date_visite) = :mois");
        $query->bindParam("site", $site, PDO::PARAM_STR);
        $query->bindParam("mois", $mois, PDO::PARAM_STR);
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    public function graph_nom_site()
    {
      $query = $this->db->prepare("select site.nom from site,visiter where site.num_site=visiter.num_site group by nom");
      $query->execute();
      $data = array();
      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      $data[] = $row;
    }
      return $data;
    }

    public function graph_effectif()
    {
        $query = $this->db->prepare("select sum(nbjrs) as Effectif from site,visiter where site.num_site=visiter.num_site group by nom");
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
      }
        return $data;
    }

    public function graph_total()
    {
      $query = $this->db->prepare("select sum(tarif_jrs*nbjrs) as Total from site,visiter where site.num_site=visiter.num_site group by nom");
      $query->execute();
      $data = array();
      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      $data[] = $row;
    }
      return $data;
    }

}

?>
