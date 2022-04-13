<?php

namespace MarekViger\PointOfSale\Controller\Adminhtml\Pos;

use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;

/**
 * New action Pos controller.
 */
class NewAction extends Action implements HttpGetActionInterface
{
    /**
     * Authorization level of a basic admin session.
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'MarekViger_PointOfSale::pos_index';

    /**
     * Create new Pos action.
     *
     * @return Page|ResultInterface
     */
    public function execute()
    {
        /** @var Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu('MarekViger_PointOfSale::pos_index');
        $resultPage->getConfig()->getTitle()->prepend(__('New Point Of Sale'));

        return $resultPage;
    }
}
