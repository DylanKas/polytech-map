<?php

namespace AppBundle\Repository;

/**
 * InteretRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class InteretRepository extends \Doctrine\ORM\EntityRepository
{
    public function findAllByRecherche($recherche){
        $res = $this->getEntityManager()->createQuery(
            "SELECT e FROM AppBundle:Interet e WHERE UPPER(e.amenity) = UPPER('".$recherche. "')")->setMaxResults(500)->getResult();
        return $res; 
    }


    public function genererGeoJSON($latitude, $longitude, $rayon,$interet,$returnSqlArray=false){
            $json = "{
                \"type\": \"FeatureCollection\",
                \"features\": [";
                $listePoints = $this->executerSQL("CALL get_points_points_dinterets($latitude, $longitude, $rayon,\"$interet\");");
                if($returnSqlArray){
                    return $listePoints;
                }
                foreach ($listePoints as $point) {
                $json .= "
                         {
                           \"type\": \"Feature\",
                           \"geometry\": {
                             \"type\": \"Point\",
                             \"coordinates\": [". strval($point["longitude"]) . ", " . strval($point["latitude"]) ."]
                           },
                           \"properties\": {
                             \"name\": \"". $point["amenity"] ."\"
                             }
                         },\n";
                }
                $json = substr($json, 0, -2);
                $json.= "\n]\n}";
                /*
                if (!$handle = fopen("geo.json", 'w')) {
                     echo "Impossible d'ouvrir le fichier (geo.json)";
                     exit;
                }
                if (fwrite($handle, $json) === FALSE) {
                    echo "Impossible d'écrire dans le fichier (geo.json)";
                    exit;
                }
                fclose($handle);
                */
            return $json;
    }

    public function executerSQL($commandeSQL){

        return $this->getEntityManager()->getConnection()->executeQuery($commandeSQL)->fetchAll();
    }
    
    public function findNbDataPharmacies(){
        $res = $this->getEntityManager()->createQuery(
            "SELECT COUNT(e) FROM AppBundle:Interet e WHERE UPPER(e.amenity) = UPPER('pharmacy')")->getResult();
        return $res; 
    }
    
    public function findNbDataBibliotheque(){
        $res = $this->getEntityManager()->createQuery(
            "SELECT COUNT(e) FROM AppBundle:Interet e WHERE UPPER(e.amenity) = UPPER('library')")->getResult();
        return $res; 
    }
    
    public function findNbDataBanque(){
        $res = $this->getEntityManager()->createQuery(
            "SELECT COUNT(e) FROM AppBundle:Interet e WHERE UPPER(e.amenity) = UPPER('bank')")->getResult();
        return $res; 
    }
    
    public function findNbDataCafe(){
        $res = $this->getEntityManager()->createQuery(
            "SELECT COUNT(e) FROM AppBundle:Interet e WHERE UPPER(e.amenity) = UPPER('cafe')")->getResult();
        return $res; 
    }
    
    public function findNbDataDistributeur(){
        $res = $this->getEntityManager()->createQuery(
            "SELECT COUNT(e) FROM AppBundle:Interet e WHERE UPPER(e.amenity) = UPPER('atm')")->getResult();
        return $res; 
    }
    
    public function findNbDataRestaurant(){
        $res = $this->getEntityManager()->createQuery(
            "SELECT COUNT(e) FROM AppBundle:Interet e WHERE UPPER(e.amenity) = UPPER('restaurant')")->getResult();
        return $res; 
    }
    
    public function findNbDataEssence(){
        $res = $this->getEntityManager()->createQuery(
            "SELECT COUNT(e) FROM AppBundle:Interet e WHERE UPPER(e.amenity) = UPPER('fuel')")->getResult();
        return $res; 
    }

    public function findNbDataParking(){
        $res = $this->getEntityManager()->createQuery(
            "SELECT COUNT(e) FROM AppBundle:Interet e WHERE UPPER(e.amenity) = UPPER('parking')")->getResult();
        return $res; 
    }
}
