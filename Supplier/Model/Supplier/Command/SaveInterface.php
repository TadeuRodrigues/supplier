<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Iqmosaic\Supplier\Model\Supplier\Command;

use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Validation\ValidationException;
use Iqmosaic\SupplierApi\Api\Data\SupplierInterface;

/**
 * Save Source data command (Service Provider Interface - SPI)
 *
 * Separate command interface to which Repository proxies initial Save call, could be considered as SPI - Interfaces
 * that you should extend and implement to customize current behaviour, but NOT expected to be used (called) in the code
 * of business logic directly
 *
 * @see \Magento\InventoryApi\Api\SourceRepositoryInterface
 * @api
 */
interface SaveInterface
{
    /**
     * Save Source data
     *
     * @param SupplierInterface $source
     * @return void
     * @throws ValidationException
     * @throws CouldNotSaveException
     */
    public function execute(SupplierInterface $source): int;
}
