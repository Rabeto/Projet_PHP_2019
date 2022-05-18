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
     * @param $num_site
     * @param $nom
     * @param $lieu
     * @return $mixed
     * */
    public function Create($num_site, $nom, $lieu, $tarif_jrs)
    {
        $query = $this->db->prepare("INSERT INTO site(num_site, nom, lieu, tarif_jrs) VALUES (:num_site,:nom,:lieu,:tarif_jrs)");
        $query->bindParam("num_site", $num_site, PDO::PARAM_STR);
        $query->bindParam("nom", $nom, PDO::PARAM_STR);
        $query->bindParam("lieu", $lieu, PDO::PARAM_STR);
        $query->bindParam("tarif_jrs", $tarif_jrs, PDO::PARAM_STR);
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
        $query = $this->db->prepare("SELECT * FROM site ORDER BY num_site ASC");
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
     * @param $user_id_site
     * */
    public function Delete($user_id_site)
    {
        $query = $this->db->prepare("DELETE FROM site WHERE id_site = :id_site");
        $query->bindParam("id_site", $user_id_site, PDO::PARAM_STR);
        $query->execute();
    }
 
    /*
     * Update Record
     *
     * @param $num_site
     * @param $nom
     * @param $lieu
     * @return $mixed
     * */
    public function Update($num_site, $nom, $lieu, $tarif_jrs, $user_id_site)
    {
        $query = $this->db->prepare("UPDATE site SET num_site = :num_site, nom = :nom, lieu = :lieu, tarif_jrs = :tarif_jrs  WHERE id_site = :id_site");
        $query->bindParam("num_site", $num_site, PDO::PARAM_STR);
        $query->bindParam("nom", $nom, PDO::PARAM_STR);
        $query->bindParam("lieu", $lieu, PDO::PARAM_STR);
        $query->bindParam("tarif_jrs", $tarif_jrs, PDO::PARAM_STR);
        $query->bindParam("id_site", $user_id_site, PDO::PARAM_STR);
        $query->execute();
    }
 
    /*
     * Get Details
     *
     * @param $user_id_site
     * */
    public function Details($user_id_site)
    {
        $query = $this->db->prepare("SELECT * FROM site WHERE id_site = :id_site");
        $query->bindParam("id_site", $user_id_site, PDO::PARAM_STR);
        $query->execute();
        return json_encode($query->fetch(PDO::FETCH_ASSOC));
    }
    
}
 
?>