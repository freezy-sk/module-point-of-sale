<?php

namespace MarekViger\PointOfSale\Controller\Pos;

use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        $resultPage->getConfig()->getTitle()->prepend(__('Available Points Of Sale'));

        return $resultPage;
    }
}
