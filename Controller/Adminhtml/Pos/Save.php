<?php

namespace MarekViger\PointOfSale\Controller\Adminhtml\Pos;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\DataObject;
use Magento\Framework\Exception\CouldNotSaveException;
use MarekViger\PointOfSale\Api\Data\PosInterface;
use MarekViger\PointOfSale\Api\Data\PosInterfaceFactory;
use MarekViger\PointOfSale\Api\SavePosInterface;

/**
 * Save Pos controller action.
 */
class Save extends Action implements HttpPostActionInterface
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'MarekViger_PointOfSale::pos_index';

    /**
     * @var DataPersistorInterface
     */
    private $dataPersistor;

    /**
     * @var SavePosInterface
     */
    private $saveCommand;

    /**
     * @var PosInterfaceFactory
     */
    private $entityDataFactory;

    /**
     * @param Context $context
     * @param DataPersistorInterface $dataPersistor
     * @param SavePosInterface $saveCommand
     * @param PosInterfaceFactory $entityDataFactory
     */
    public function __construct(
        Context $context,
        DataPersistorInterface $dataPersistor,
        SavePosInterface $saveCommand,
        PosInterfaceFactory $entityDataFactory
    ) {
        parent::__construct($context);
        $this->dataPersistor = $dataPersistor;
        $this->saveCommand = $saveCommand;
        $this->entityDataFactory = $entityDataFactory;
    }

    /**
     * Save Pos Action.
     *
     * @return ResponseInterface|ResultInterface
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $params = $this->getRequest()->getParams();

        try {
            /** @var PosInterface|DataObject $entityModel */
            $entityModel = $this->entityDataFactory->create();
            $entityModel->addData($params['general']);
            $this->saveCommand->execute($entityModel);
            $this->messageManager->addSuccessMessage(__('The Point Of Sale data was saved successfully'));
            $this->dataPersistor->clear('entity');
        } catch (CouldNotSaveException $exception) {
            $this->messageManager->addErrorMessage($exception->getMessage());
            $this->dataPersistor->set('entity', $params);

            return $resultRedirect->setPath('*/*/edit', [
                PosInterface::POS_ID => $this->getRequest()->getParam(PosInterface::POS_ID),
            ]);
        }

        return $resultRedirect->setPath('*/*/');
    }
}
