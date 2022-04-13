<?php

namespace MarekViger\PointOfSale\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use MarekViger\PointOfSale\Api\Data\PosInterface;

class Pos extends AbstractDb
{
    protected $_eventPrefix = 'pos_resource_model';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('pos', PosInterface::POS_ID);
        $this->_useIsObjectNew = true;
    }
}
