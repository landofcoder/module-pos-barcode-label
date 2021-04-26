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

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Exception\CouldNotSaveException;
use Lof\BarcodeLabel\Api\Data\LabelInterfaceFactory;
use Lof\BarcodeLabel\Api\LabelRepositoryInterface;
use Magento\Framework\Api\DataObjectHelper;
use Lof\BarcodeLabel\Api\Data\LabelSearchResultsInterfaceFactory;
use Lof\BarcodeLabel\Model\ResourceModel\Label as ResourceLabel;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Lof\BarcodeLabel\Model\ResourceModel\Label\CollectionFactory as LabelCollectionFactory;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;

class LabelRepository implements LabelRepositoryInterface
{
    /**
     * @var LabelSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;

    /**
     * @var DataObjectHelper
     */
    protected $dataObjectHelper;

    /**
     * @var DataObjectProcessor
     */
    protected $dataObjectProcessor;

    /**
     * @var LabelCollectionFactory
     */
    protected $labelCollectionFactory;

    /**
     * @var JoinProcessorInterface
     */
    protected $extensionAttributesJoinProcessor;

    /**
     * @var LabelFactory
     */
    protected $labelFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @var ResourceLabel
     */
    protected $resource;

    /**
     * @var StoreManagerInterface
     */
    private $storeManager;

    /**
     * @var ExtensibleDataObjectConverter
     */
    protected $extensibleDataObjectConverter;

    /**
     * @var LabelInterfaceFactory
     */
    protected $dataLabelFactory;

    /**
     * @param ResourceLabel $resource
     * @param LabelFactory $labelFactory
     * @param LabelInterfaceFactory $dataLabelFactory
     * @param LabelCollectionFactory $labelCollectionFactory
     * @param LabelSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceLabel $resource,
        LabelFactory $labelFactory,
        LabelInterfaceFactory $dataLabelFactory,
        LabelCollectionFactory $labelCollectionFactory,
        LabelSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->labelFactory = $labelFactory;
        $this->labelCollectionFactory = $labelCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataLabelFactory = $dataLabelFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Lof\BarcodeLabel\Api\Data\LabelInterface $label
    ) {
        /* if (empty($label->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $label->setStoreId($storeId);
        } */

        $labelData = $this->extensibleDataObjectConverter->toNestedArray(
            $label,
            [],
            \Lof\BarcodeLabel\Api\Data\LabelInterface::class
        );

        $labelModel = $this->labelFactory->create()->setData($labelData);

        try {
            $this->resource->save($labelModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the label: %1',
                $exception->getMessage()
            ));
        }
        return $labelModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function get($labelId)
    {
        $label = $this->labelFactory->create();
        $this->resource->load($label, $labelId);
        if (!$label->getId()) {
            throw new NoSuchEntityException(__('label with id "%1" does not exist.', $labelId));
        }
        return $label->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->labelCollectionFactory->create();

        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Lof\BarcodeLabel\Api\Data\LabelInterface::class
        );

        $this->collectionProcessor->process($criteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);

        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }

        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Lof\BarcodeLabel\Api\Data\LabelInterface $label
    ) {
        try {
            $labelModel = $this->labelFactory->create();
            $this->resource->load($labelModel, $label->getLabelId());
            $this->resource->delete($labelModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the label: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($labelId)
    {
        return $this->delete($this->get($labelId));
    }
}
