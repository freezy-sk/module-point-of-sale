<?php

namespace MarekViger\PointOfSale\Controller\Pos;

use Magento\Framework\Controller\ResultFactory;

class All extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        $resultPage->getConfig()->getTitle()->prepend(__('All Points Of Sale'));

        return $resultPage;
    }
}
