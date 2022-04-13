<?php

namespace MarekViger\PointOfSale\Api;

use Magento\Framework\Exception\CouldNotDeleteException;

/**
 * Delete Pos by id Command.
 *
 * @api
 */
interface DeletePosByIdInterface
{
    /**
     * Delete Pos.
     * @param int $entityId
     * @return void
     * @throws CouldNotDeleteException
     */
    public function execute(int $entityId): void;
}
