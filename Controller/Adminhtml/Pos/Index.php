<?php

namespace MarekViger\PointOfSale\Controller\Adminhtml\Pos;

use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;

/**
 * Pos backend index (list) controller.
 */
class Index extends Action implements HttpGetActionInterface
{
    /**
     * Authorization level of a basic admin session.
     */
    const ADMIN_RESOURCE = 'MarekViger_PointOfSale::pos_index';

    /**
     * Execute action based on request and return result.
     *
     * @return ResultInterface|ResponseInterface
     */
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        $resultPage->setActiveMenu('MarekViger_PointOfSale::pos_index');
        $resultPage->addBreadcrumb(__('Points Of Sale'), __('Points Of Sale'));
        $resultPage->addBreadcrumb(__('Manage Points Of Sale'), __('Manage Points Of Sale'));
        $resultPage->getConfig()->getTitle()->prepend(__('Points Of Sale List'));

        return $resultPage;
    }
}
