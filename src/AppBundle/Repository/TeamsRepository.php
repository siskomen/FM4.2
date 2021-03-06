<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Teams;
use Doctrine\ORM\EntityManagerInterface;

/**
 * TeamsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TeamsRepository extends \Doctrine\ORM\EntityRepository
{

    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, new \Doctrine\ORM\Mapping\ClassMetadata(Teams::class));
    }

    public function getTeamByDivisionDesc($divisionId){
        return $this->_em->getRepository(Teams::class)->findBy(['division' => $divisionId], ['points' => 'DESC']);
    }

    public function getTeamsByName($name){
        $teams = $this->_em
            ->createQuery(
                'SELECT p
                FROM AppBundle:Teams p
                WHERE p.name LIKE :name
                ORDER BY p.name ASC'
             )->setParameter('name', "%".$name."%")->getResult();
            return $teams;
    }


}
