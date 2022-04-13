<?php

namespace MarekViger\PointOfSale\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Pos entity search result.
 */
interface PosSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Set items.
     *
     * @param PosInterface[] $items
     *
     * @return PosSearchResultsInterface
     */
    public function setItems(array $items): PosSearchResultsInterface;

    /**
     * Get items.
     *
     * @return PosInterface[]
     */
    public function getItems(): array;
}
