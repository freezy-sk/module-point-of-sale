<?php

namespace MarekViger\PointOfSale\Model;

use Magento\Framework\Api\SearchResults;
use MarekViger\PointOfSale\Api\Data\PosSearchResultsInterface;

/**
 * Pos entity search results implementation.
 */
class PosSearchResults extends SearchResults implements PosSearchResultsInterface
{
    /**
     * Set items list.
     *
     * @param array $items
     *
     * @return PosSearchResultsInterface
     */
    public function setItems(array $items): PosSearchResultsInterface
    {
        return parent::setItems($items);
    }

    /**
     * Get items list.
     *
     * @return array
     */
    public function getItems(): array
    {
        return parent::getItems();
    }
}
