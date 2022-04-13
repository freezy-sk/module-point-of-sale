<?php

namespace MarekViger\PointOfSale\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use MarekViger\PointOfSale\Api\Data\PosSearchResultsInterface;

/**
 * Get Pos list by search criteria query.
 *
 * @api
 */
interface GetPosListInterface
{
    /**
     * Get Pos list by search criteria.
     * @param SearchCriteriaInterface|null $searchCriteria
     * @return PosSearchResultsInterface
     */
    public function execute(?SearchCriteriaInterface $searchCriteria = null): PosSearchResultsInterface;
}
