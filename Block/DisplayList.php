<?php

namespace MarekViger\PointOfSale\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use MarekViger\PointOfSale\Model\PosFactory;

class DisplayList extends Template
{
    private PosFactory $posFactory;

    public function __construct(
        Context $context,
        PosFactory $posFactory
    ) {
        $this->posFactory = $posFactory;
        parent::__construct($context);
    }

    public function getPosCollection(?bool $filterIsAvailable = null)
    {
        $collection = $this->posFactory->create()->getCollection();

        if ($filterIsAvailable !== null) {
            $collection->addFieldToFilter('is_available', $filterIsAvailable);
        }

        return $collection;
    }
}
