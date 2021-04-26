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

namespace Lof\BarcodeLabel\Api\Data;

interface LabelSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get label list.
     * @return \Lof\BarcodeLabel\Api\Data\LabelInterface[]
     */
    public function getItems();

    /**
     * Set template_name list.
     * @param \Lof\BarcodeLabel\Api\Data\LabelInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
