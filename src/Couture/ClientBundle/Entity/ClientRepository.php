<?php

namespace Couture\ClientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityRepository ;
use Couture\ClientBundle\Entity\Client as Client;
use Couture\CoutureBundle\Entity\Couture as Couture;
use Couture\FacturationBundle\Entity\Facture as Facture ;


class ClientRepository extends EntityRepository
{
    /*
    *  Renvoyer la dernière facture d'un client
    */
    public function getLastFactures($id, $nombreFactures)
    {
        
        $req="SELECT f "
                . "FROM CoutureFacturationBundle:Facture f, CoutureCoutureBundle:Couture ct, CoutureClientBundle:Client c "
                . "WHERE f.couture = ct.id"
                . "AND ct.client = c.id"
                . "AND c.id=?1"
                . "ORDER BY f.date DESC limit 0,?2";
                
        $query = $this->_em->createQuery($req);
        $query->setParameter(1, $id);
        $query->setParameter(2, $nombreFactures);
        $factures = $query->getResult();
        return $factures;
        var_dump($factures);
        die;
                    
    }
}
