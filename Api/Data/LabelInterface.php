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

namespace Lof\BarcodeLabel\Api\Data;

/**
 * Interface LabelInterface
 *
 * @package Lof\BarcodeLabel\Api\Data
 */
interface LabelInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const LABEL_WIDTH = 'label_width';
    const MARGIN_TOP = 'margin_top';
    const PRODUCT_ATTRIBUTE = 'product_attribute';
    const FONT_SIZE = 'font_size';
    const LABEL_HEIGHT = 'label_height';
    const LABEL_PER_ROW = 'label_per_row';
    const STATUS = 'status';
    const MARGIN_BOTTOM = 'margin_bottom';
    const MARGIN_RIGHT = 'margin_right';
    const LABEL_ID = 'label_id';
    const TEMPLATE_NAME = 'template_name';
    const FORMAT = 'format';
    const MARGIN_LEFT = 'margin_left';

    /**
     * Get label_id
     * @return string|null
     */
    public function getLabelId();

    /**
     * Set label_id
     * @param string $labelId
     * @return \Lof\BarcodeLabel\Api\Data\LabelInterface
     */
    public function setLabelId($labelId);

    /**
     * Get template_name
     * @return string|null
     */
    public function getTemplateName();

    /**
     * Set template_name
     * @param string $templateName
     * @return \Lof\BarcodeLabel\Api\Data\LabelInterface
     */
    public function setTemplateName($templateName);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Lof\BarcodeLabel\Api\Data\LabelExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Lof\BarcodeLabel\Api\Data\LabelExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Lof\BarcodeLabel\Api\Data\LabelExtensionInterface $extensionAttributes
    );

    /**
     * Get format
     * @return string|null
     */
    public function getFormat();

    /**
     * Set format
     * @param string $format
     * @return \Lof\BarcodeLabel\Api\Data\LabelInterface
     */
    public function setFormat($format);

    /**
     * Get status
     * @return string|null
     */
    public function getStatus();

    /**
     * Set status
     * @param string $status
     * @return \Lof\BarcodeLabel\Api\Data\LabelInterface
     */
    public function setStatus($status);

    /**
     * Get label_per_row
     * @return string|null
     */
    public function getLabelPerRow();

    /**
     * Set label_per_row
     * @param string $labelPerRow
     * @return \Lof\BarcodeLabel\Api\Data\LabelInterface
     */
    public function setLabelPerRow($labelPerRow);

    /**
     * Get label_width
     * @return string|null
     */
    public function getLabelWidth();

    /**
     * Set label_width
     * @param string $labelWidth
     * @return \Lof\BarcodeLabel\Api\Data\LabelInterface
     */
    public function setLabelWidth($labelWidth);

    /**
     * Get label_height
     * @return string|null
     */
    public function getLabelHeight();

    /**
     * Set label_height
     * @param string $labelHeight
     * @return \Lof\BarcodeLabel\Api\Data\LabelInterface
     */
    public function setLabelHeight($labelHeight);

    /**
     * Get font_size
     * @return string|null
     */
    public function getFontSize();

    /**
     * Set font_size
     * @param string $fontSize
     * @return \Lof\BarcodeLabel\Api\Data\LabelInterface
     */
    public function setFontSize($fontSize);

    /**
     * Get margin_top
     * @return string|null
     */
    public function getMarginTop();

    /**
     * Set margin_top
     * @param string $marginTop
     * @return \Lof\BarcodeLabel\Api\Data\LabelInterface
     */
    public function setMarginTop($marginTop);

    /**
     * Get margin_left
     * @return string|null
     */
    public function getMarginLeft();

    /**
     * Set margin_left
     * @param string $marginLeft
     * @return \Lof\BarcodeLabel\Api\Data\LabelInterface
     */
    public function setMarginLeft($marginLeft);

    /**
     * Get margin_right
     * @return string|null
     */
    public function getMarginRight();

    /**
     * Set margin_right
     * @param string $marginRight
     * @return \Lof\BarcodeLabel\Api\Data\LabelInterface
     */
    public function setMarginRight($marginRight);

    /**
     * Get margin_bottom
     * @return string|null
     */
    public function getMarginBottom();

    /**
     * Set margin_bottom
     * @param string $marginBottom
     * @return \Lof\BarcodeLabel\Api\Data\LabelInterface
     */
    public function setMarginBottom($marginBottom);

    /**
     * Get product_attribute
     * @return string|null
     */
    public function getProductAttribute();

    /**
     * Set product_attribute
     * @param string $productAttribute
     * @return \Lof\BarcodeLabel\Api\Data\LabelInterface
     */
    public function setProductAttribute($productAttribute);
}

