<?php

namespace MarekViger\PointOfSale\Model;

use Magento\Framework\Model\AbstractModel;
use MarekViger\PointOfSale\Model\ResourceModel\Pos as PosResource;

class Pos extends AbstractModel
{
    protected $_eventPrefix = 'pos_model';

    /**
     * Initialize magento model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(PosResource::class);
    }
}
