<?php

namespace AppBundle\Repository;

use AppBundle\Entity\YouthTeams;
use Doctrine\ORM\EntityManagerInterface;

/**
 * YouthTeamsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class YouthTeamsRepository extends \Doctrine\ORM\EntityRepository
{

    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, new \Doctrine\ORM\Mapping\ClassMetadata(YouthTeams::class));
    }

    public function getYouthTeamByDivisionDesc($divisionId){
       return $this->_em->getRepository(YouthTeams::class)->findBy(['division' => $divisionId], ['points' => 'DESC']);
    }
}
