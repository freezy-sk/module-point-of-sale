<?php

namespace MarekViger\PointOfSale\Command\Pos;

use Exception;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use MarekViger\PointOfSale\Api\Data\PosInterface;
use MarekViger\PointOfSale\Api\DeletePosByIdInterface;
use MarekViger\PointOfSale\Model\Pos;
use MarekViger\PointOfSale\Model\PosFactory;
use MarekViger\PointOfSale\Model\ResourceModel\Pos as PosResource;
use Psr\Log\LoggerInterface;

/**
 * Delete Pos by id Command.
 */
class DeleteByIdCommand implements DeletePosByIdInterface
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
     * @param Pos $resource
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
    public function execute(int $entityId): void
    {
        try {
            /** @var Pos $model */
            $model = $this->modelFactory->create();
            $this->resource->load($model, $entityId, PosInterface::POS_ID);

            if (!$model->getData(PosInterface::POS_ID)) {
                throw new NoSuchEntityException(
                    __('Could not find Point Of Sale with ID: `%id`',
                        [
                            'id' => $entityId,
                        ]
                    )
                );
            }

            $this->resource->delete($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not delete Point Of Sale. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception,
                ]
            );
            throw new CouldNotDeleteException(__('Could not delete Point Of Sale.'));
        }
    }
}
