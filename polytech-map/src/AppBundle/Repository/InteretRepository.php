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

    public function genererGeoJSON($latitude, $longitude, $rayon,$interet){
            $json = "
                {
                \"type\": \"FeatureCollection\",
                \"features\": [";
                $listePoints = $this->executerSQL("CALL get_points_gares($latitude, $longitude, $rayon,$interet);");
                foreach ($listePoints as $point) {
                $json .= "
                         {
                           \"type\": \"Feature\",
                           \"geometry\": {
                             \"type\": \"Point\",
                             \"coordinates\": [". strval($point["latitude"]) . ", " . strval($point["longitude"]) ."]
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

}
