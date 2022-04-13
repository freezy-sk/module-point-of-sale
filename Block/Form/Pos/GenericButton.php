<?php

namespace MarekViger\PointOfSale\Block\Form\Pos;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\UrlInterface;
use MarekViger\PointOfSale\Api\Data\PosInterface;

/**
 * Generic (form) button for Pos entity.
 */
class GenericButton
{
    /**
     * @var Context
     */
    private $context;

    /**
     * @var UrlInterface
     */
    private $urlBuilder;

    /**
     * @param Context $context
     */
    public function __construct(
        Context $context
    ) {
        $this->context = $context;
        $this->urlBuilder = $context->getUrlBuilder();
    }

    /**
     * Get Pos entity id.
     *
     * @return int
     */
    public function getPosId(): int
    {
        return (int)$this->context->getRequest()->getParam(PosInterface::POS_ID);
    }

    /**
     * Wrap button specific options to settings array.
     *
     * @param string $label
     * @param string $class
     * @param string $onclick
     * @param array $dataAttribute
     * @param int $sortOrder
     *
     * @return array
     */
    protected function wrapButtonSettings(
        string $label,
        string $class,
        string $onclick = '',
        array $dataAttribute = [],
        int $sortOrder = 0
    ): array {
        return [
            'label' => $label,
            'on_click' => $onclick,
            'data_attribute' => $dataAttribute,
            'class' => $class,
            'sort_order' => $sortOrder,
        ];
    }

    /**
     * Get url.
     *
     * @param string $route
     * @param array $params
     *
     * @return string
     */
    protected function getUrl(string $route, array $params = []): string
    {
        return $this->urlBuilder->getUrl($route, $params);
    }
}
