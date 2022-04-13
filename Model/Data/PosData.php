<?php

namespace MarekViger\PointOfSale\Model\Data;

use Magento\Framework\DataObject;
use MarekViger\PointOfSale\Api\Data\PosInterface;

class PosData extends DataObject implements PosInterface
{
    /**
     * Getter for PosId.
     *
     * @return int|null
     */
    public function getPosId(): ?int
    {
        return $this->getData(self::POS_ID) === null ? null : (int) $this->getData(self::POS_ID);
    }

    /**
     * Setter for PosId.
     *
     * @param int $posId
     *
     * @return void
     */
    public function setPosId(int $posId): void
    {
        $this->setData(self::POS_ID, $posId);
    }

    /**
     * Getter for Name.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->getData(self::NAME);
    }

    /**
     * Setter for Name.
     *
     * @param string $name
     *
     * @return void
     */
    public function setName(string $name): void
    {
        $this->setData(self::NAME, $name);
    }

    /**
     * Getter for Address.
     *
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->getData(self::ADDRESS);
    }

    /**
     * Setter for Address.
     *
     * @param string $address
     *
     * @return void
     */
    public function setAddress(string $address): void
    {
        $this->setData(self::ADDRESS, $address);
    }

    /**
     * Getter for IsAvailable.
     *
     * @return bool
     */
    public function getIsAvailable(): bool
    {
        return (bool) $this->getData(self::IS_AVAILABLE);
    }

    /**
     * Setter for IsAvailable.
     *
     * @param bool $isAvailable
     *
     * @return void
     */
    public function setIsAvailable(bool $isAvailable): void
    {
        $this->setData(self::IS_AVAILABLE, $isAvailable);
    }
}
