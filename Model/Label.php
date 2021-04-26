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

namespace Lof\BarcodeLabel\Model;

use Magento\Framework\Api\DataObjectHelper;
use Lof\BarcodeLabel\Api\Data\LabelInterface;
use Lof\BarcodeLabel\Api\Data\LabelInterfaceFactory;

/**
 * Class Label
 *
 * @package Lof\BarcodeLabel\Model
 */
class Label extends \Magento\Framework\Model\AbstractModel
{
    /**
     * @var DataObjectHelper
     */
    protected $dataObjectHelper;

    /**
     * @var string
     */
    protected $_eventPrefix = 'lof_barcodelabel_label';

    /**
     * @var LabelInterfaceFactory
     */
    protected $labelDataFactory;

    /**
     * Label constructor.
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param LabelInterfaceFactory $labelDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param ResourceModel\Label $resource
     * @param ResourceModel\Label\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        LabelInterfaceFactory $labelDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Lof\BarcodeLabel\Model\ResourceModel\Label $resource,
        \Lof\BarcodeLabel\Model\ResourceModel\Label\Collection $resourceCollection,
        array $data = []
    ) {
        $this->labelDataFactory = $labelDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve label model with label data
     * @return LabelInterface
     */
    public function getDataModel()
    {
        $labelData = $this->getData();

        $labelDataObject = $this->labelDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $labelDataObject,
            $labelData,
            LabelInterface::class
        );

        return $labelDataObject;
    }
}
