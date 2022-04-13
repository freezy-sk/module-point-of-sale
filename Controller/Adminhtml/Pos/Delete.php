<?php

namespace MarekViger\PointOfSale\Controller\Adminhtml\Pos;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use MarekViger\PointOfSale\Api\Data\PosInterface;
use MarekViger\PointOfSale\Api\DeletePosByIdInterface;

/**
 * Delete Pos controller.
 */
class Delete extends Action implements HttpPostActionInterface, HttpGetActionInterface
{
    /**
     * Authorization level of a basic admin session.
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'MarekViger_PointOfSale::pos_index';

    /**
     * @var DeletePosByIdInterface
     */
    private $deleteByIdCommand;

    /**
     * @param Context $context
     * @param DeletePosByIdInterface $deleteByIdCommand
     */
    public function __construct(
        Context $context,
        DeletePosByIdInterface $deleteByIdCommand
    ) {
        parent::__construct($context);
        $this->deleteByIdCommand = $deleteByIdCommand;
    }

    /**
     * Delete Pos action.
     *
     * @return ResultInterface
     */
    public function execute()
    {
        /** @var ResultInterface $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setPath('*/*/');
        $entityId = (int) $this->getRequest()->getParam(PosInterface::POS_ID);

        try {
            $this->deleteByIdCommand->execute($entityId);
            $this->messageManager->addSuccessMessage(__('You have successfully deleted Point Of Sale'));
        } catch (CouldNotDeleteException|NoSuchEntityException $exception) {
            $this->messageManager->addErrorMessage($exception->getMessage());
        }

        return $resultRedirect;
    }
}
