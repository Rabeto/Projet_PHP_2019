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
     * @param $num_site
     * @param $nbjrs
     * @return $mixed
     * */
    public function Create($num_visiteur, $num_site, $nbjrs, $date_visite)
    {
        $query = $this->db->prepare("INSERT INTO visiter(num_visiteur, num_site, nbjrs, date_visite) VALUES (:num_visiteur,:num_site,:nbjrs,:date_visite)");
        $query->bindParam("num_visiteur", $num_visiteur, PDO::PARAM_STR);
        $query->bindParam("num_site", $num_site, PDO::PARAM_STR);
        $query->bindParam("nbjrs", $nbjrs, PDO::PARAM_STR);
        $query->bindParam("date_visite", $date_visite, PDO::PARAM_STR);
        $query->execute();
        return $this->db->lastInsertid();
    }
 
    /*
     * Read all records
     *
     * @return $mixed
     * */
    public function Read()
    {
        $query = $this->db->prepare("SELECT * FROM visiter");
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
     * @param $user_id_visiter
     * */
    public function Delete($user_id_visiter)
    {
        $query = $this->db->prepare("DELETE FROM visiter WHERE id_visiter = :id_visiter");
        $query->bindParam("id_visiter", $user_id_visiter, PDO::PARAM_STR);
        $query->execute();
    }
 
    /*
     * Update Record
     *
     * @param $num_visiteur
     * @param $num_site
     * @param $nbjrs
     * @return $mixed
     * */
    public function Update($num_visiteur, $num_site, $nbjrs, $date_visite, $user_id_visiter)
    {
        $query = $this->db->prepare("UPDATE visiter SET num_visiteur = :num_visiteur, num_site = :num_site, nbjrs = :nbjrs, date_visite = :date_visite  WHERE id_visiter = :id_visiter");
        $query->bindParam("num_visiteur", $num_visiteur, PDO::PARAM_STR);
        $query->bindParam("num_site", $num_site, PDO::PARAM_STR);
        $query->bindParam("nbjrs", $nbjrs, PDO::PARAM_STR);
        $query->bindParam("date_visite", $date_visite, PDO::PARAM_STR);
        $query->bindParam("id_visiter", $user_id_visiter, PDO::PARAM_STR);
        $query->execute();
    }
 
    /*
     * Get Details
     *
     * @param $user_id_visiter
     * */
    public function Details($user_id_visiter)
    {
        $query = $this->db->prepare("SELECT * FROM visiter WHERE id_visiter = :id_visiter");
        $query->bindParam("id_visiter", $user_id_visiter, PDO::PARAM_STR);
        $query->execute();
        return json_encode($query->fetch(PDO::FETCH_ASSOC));
    }

    public function Affiche()
    {
        $query = $this->db->prepare("SELECT num_visiteur,nom from visiteur");
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    public function Affiche_ns()
    {
        $query = $this->db->prepare("SELECT num_site,lieu from site");
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }
    
}
 
?>