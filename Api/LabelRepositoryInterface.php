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

namespace Lof\BarcodeLabel\Api;

interface LabelRepositoryInterface
{

    /**
     * Save label
     * @param \Lof\BarcodeLabel\Api\Data\LabelInterface $label
     * @return \Lof\BarcodeLabel\Api\Data\LabelInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Lof\BarcodeLabel\Api\Data\LabelInterface $label
    );

    /**
     * Retrieve label
     * @param string $labelId
     * @return \Lof\BarcodeLabel\Api\Data\LabelInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($labelId);

    /**
     * Retrieve label matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Lof\BarcodeLabel\Api\Data\LabelSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete label
     * @param \Lof\BarcodeLabel\Api\Data\LabelInterface $label
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Lof\BarcodeLabel\Api\Data\LabelInterface $label
    );

    /**
     * Delete label by ID
     * @param string $labelId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($labelId);
}
