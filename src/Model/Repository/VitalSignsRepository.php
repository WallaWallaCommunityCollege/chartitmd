<?php
declare(strict_types=1);
/**
 * Contains class VitalSignsRepository.
 *
 * PHP version 7.2+
 *
 *
 * LICENSE:
 * This file is part of ChartItMD.
 * Copyright (C) 2019 ChartItMD Development Group
 *
 * @author    Alec Aichele <aichelealec@gmail.com>
 * @copyright 2019 ChartItMD Development Group
 * @license   Proprietary
 */

namespace ChartItMD\Model\Repository;

use ChartItMD\Model\Entity\VitalSigns;
use Doctrine\ORM\EntityRepository;

/**
 * Class VitalSignsRepository.
 *
 */
class VitalSignsRepository extends EntityRepository {
    /**
     * @param string $id
     *
     * @return VitalSigns|null
     */
    public function getVitalSignsById(string $id) : ?VitalSigns {
        try{
            $qb = $this->createQueryBuilder('v');
            $vitalSign =
                $qb->where('v.id= :id')
                    ->setParameter('id', $id)
                    ->getQuery()
                    ->getSingleResult();
        }
        catch(\Throwable $e){
            var_dump($e->getMessage());
            return null;
        }
        return $vitalSign;
    }
}