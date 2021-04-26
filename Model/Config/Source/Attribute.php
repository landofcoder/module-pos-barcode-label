<?php
/**
 * Landofcoder
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Landofcoder.com license that is
 * available through the world-wide-web at this URL:
 * https://landofcoder.com/terms
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category   Landofcoder
 * @package    Lof_BarcodeLabel
 * @copyright  Copyright (c) 2021 Landofcoder (https://www.landofcoder.com/)
 * @license    https://landofcoder.com/terms
 */

namespace Lof\BarcodeLabel\Model\Config\Source;

use Magento\Framework\App\Action\Context;

class Attribute implements \Magento\Framework\Option\ArrayInterface
{

    /**
     * @var Context
     */
    private $context;

    /**
     * @var \Magento\Catalog\Model\ResourceModel\Eav\Attribute
     */
    private $_attributeFactory;

    /**
     * Attribute constructor.
     * @param Context $context
     * @param \Magento\Catalog\Model\ResourceModel\Product\Attribute\CollectionFactory $attributeFactory
     */
    public function __construct(
        Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\Attribute\CollectionFactory $attributeFactory
    ) {
        $this->context = $context;
        $this->_attributeFactory = $attributeFactory;
    }

    /**
     * @return array
     */
    public function toOptionArray()
    {
        $options = [];
        $attributeInfo = $this->_attributeFactory->create();
        foreach ($attributeInfo as $item) {
            $options[] = [
                'label' => __($item->getFrontendLabel()),
                'value' => $item->getAttributeCode(),
            ];
        }

        return $options;
    }
}
