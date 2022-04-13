<?php

namespace MarekViger\PointOfSale\Model\ResourceModel\Pos;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use MarekViger\PointOfSale\Api\Data\PosInterface;
use MarekViger\PointOfSale\Model\Pos;
use MarekViger\PointOfSale\Model\ResourceModel\Pos as PosResource;

class Collection extends AbstractCollection
{
    protected $_idFieldName = PosInterface::POS_ID;
    protected $_eventPrefix = 'pos_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(Pos::class, PosResource::class);
    }
}
