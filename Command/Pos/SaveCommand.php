<?php

namespace MarekViger\PointOfSale\Command\Pos;

use Exception;
use Magento\Framework\Exception\CouldNotSaveException;
use MarekViger\PointOfSale\Api\Data\PosInterface;
use MarekViger\PointOfSale\Api\SavePosInterface;
use MarekViger\PointOfSale\Model\Pos;
use MarekViger\PointOfSale\Model\PosFactory;
use MarekViger\PointOfSale\Model\ResourceModel\Pos as PosResource;
use Psr\Log\LoggerInterface;

/**
 * Save Pos Command.
 */
class SaveCommand implements SavePosInterface
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var PosFactory
     */
    private $modelFactory;

    /**
     * @var PosResource
     */
    private $resource;

    /**
     * @param LoggerInterface $logger
     * @param PosFactory $modelFactory
     * @param PosResource $resource
     */
    public function __construct(
        LoggerInterface $logger,
        PosFactory $modelFactory,
        PosResource $resource
    ) {
        $this->logger = $logger;
        $this->modelFactory = $modelFactory;
        $this->resource = $resource;
    }

    /**
     * @inheritDoc
     */
    public function execute(PosInterface $pos): int
    {
        try {
            /** @var Pos $model */
            $model = $this->modelFactory->create();
            $model->addData($pos->getData());
            $model->setHasDataChanges(true);

            if (!$model->getData(PosInterface::POS_ID)) {
                $model->isObjectNew(true);
            }
            $this->resource->save($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not save Point Of Sale. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception,
                ]
            );
            throw new CouldNotSaveException(__('Could not save Point Of Sale.'));
        }

        return (int) $model->getData(PosInterface::POS_ID);
    }
}
