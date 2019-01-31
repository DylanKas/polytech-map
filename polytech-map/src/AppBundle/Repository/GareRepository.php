<?php

namespace AppBundle\Repository;

/**
 * GareRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GareRepository extends \Doctrine\ORM\EntityRepository
{

        public function genererGeoJSON($latitude, $longitude, $rayon){
                $json = "{
                    \"type\": \"FeatureCollection\",
                    \"features\": [";
                    $listePoints = $this->executerSQL("CALL get_points_gares($latitude, $longitude, $rayon);");
                    foreach ($listePoints as $point) {
                    $json .= "
                             {
                               \"type\": \"Feature\",
                               \"geometry\": {
                                 \"type\": \"Point\",
                                 \"coordinates\": [". strval($point["longitude"]) . ", " . strval($point["latitude"]) ."]
                               },
                               \"properties\": {
                                 \"name\": \"Gare de ". $point["nom"] ."\"
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

    public function findAllByRecherche($recherche){
        $res = $this->getEntityManager()->createQuery(
            "SELECT e FROM AppBundle:Gare e WHERE UPPER(e.nom) = UPPER('".$recherche. "') OR UPPER(e.nature) = UPPER('".$recherche. "')")->setMaxResults(500)->getResult();
        return $res;
    }

    public function findNbDataGare(){
        $res = $this->getEntityManager()->createQuery(
            "SELECT COUNT(e) FROM AppBundle:Gare e")->getResult();
        return $res;
    }

}
