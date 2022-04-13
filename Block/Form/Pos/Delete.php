<?php

namespace MarekViger\PointOfSale\Block\Form\Pos;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use MarekViger\PointOfSale\Api\Data\PosInterface;

/**
 * Delete entity button.
 */
class Delete extends GenericButton implements ButtonProviderInterface
{
    /**
     * Retrieve Delete button settings.
     *
     * @return array
     */
    public function getButtonData(): array
    {
        return $this->wrapButtonSettings(
            'Delete',
            'delete',
            sprintf('deleteConfirm(\'%s\', \'%s\')',
                __('Are you sure you want to delete this Point Of Sale?'),
                $this->getUrl(
                    '*/*/delete',
                    [PosInterface::POS_ID => $this->getPosId()]
                )
            ),
            [],
            20
        );
    }
}
