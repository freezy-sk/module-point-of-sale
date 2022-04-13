<?php

namespace MarekViger\PointOfSale\Api;

use Magento\Framework\Exception\CouldNotSaveException;
use MarekViger\PointOfSale\Api\Data\PosInterface;

/**
 * Save Pos Command.
 *
 * @api
 */
interface SavePosInterface
{
    /**
     * Save Pos.
     * @param PosInterface $pos
     * @return int
     * @throws CouldNotSaveException
     */
    public function execute(PosInterface $pos): int;
}
