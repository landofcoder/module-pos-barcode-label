<?php
/**
 * Copyright (c) 2019 Landofcoder
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
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
