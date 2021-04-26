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

namespace Lof\BarcodeLabel\Model\Data;

use Lof\BarcodeLabel\Api\Data\LabelInterface;

/**
 * Class Label
 *
 * @package Lof\BarcodeLabel\Model\Data
 */
class Label extends \Magento\Framework\Api\AbstractExtensibleObject implements LabelInterface
{

    /**
     * Get label_id
     * @return string|null
     */
    public function getLabelId()
    {
        return $this->_get(self::LABEL_ID);
    }

    /**
     * Set label_id
     * @param string $labelId
     * @return \Lof\BarcodeLabel\Api\Data\LabelInterface
     */
    public function setLabelId($labelId)
    {
        return $this->setData(self::LABEL_ID, $labelId);
    }

    /**
     * Get template_name
     * @return string|null
     */
    public function getTemplateName()
    {
        return $this->_get(self::TEMPLATE_NAME);
    }

    /**
     * Set template_name
     * @param string $templateName
     * @return \Lof\BarcodeLabel\Api\Data\LabelInterface
     */
    public function setTemplateName($templateName)
    {
        return $this->setData(self::TEMPLATE_NAME, $templateName);
    }

    /**
     * @return \Lof\BarcodeLabel\Api\Data\LabelExtensionInterface|\Magento\Framework\Api\ExtensionAttributesInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * @param \Lof\BarcodeLabel\Api\Data\LabelExtensionInterface $extensionAttributes
     * @return Label
     */
    public function setExtensionAttributes(
        \Lof\BarcodeLabel\Api\Data\LabelExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * @return mixed|string|null
     */
    public function getFormat()
    {
        return $this->_get(self::FORMAT);
    }

    /**
     * @param string $format
     * @return LabelInterface|Label
     */
    public function setFormat($format)
    {
        return $this->setData(self::FORMAT, $format);
    }

    /**
     * Get status
     * @return string|null
     */
    public function getStatus()
    {
        return $this->_get(self::STATUS);
    }

    /**
     * Set status
     * @param string $status
     * @return \Lof\BarcodeLabel\Api\Data\LabelInterface
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * Get label_per_row
     * @return string|null
     */
    public function getLabelPerRow()
    {
        return $this->_get(self::LABEL_PER_ROW);
    }

    /**
     * Set label_per_row
     * @param string $labelPerRow
     * @return \Lof\BarcodeLabel\Api\Data\LabelInterface
     */
    public function setLabelPerRow($labelPerRow)
    {
        return $this->setData(self::LABEL_PER_ROW, $labelPerRow);
    }

    /**
     * Get label_width
     * @return string|null
     */
    public function getLabelWidth()
    {
        return $this->_get(self::LABEL_WIDTH);
    }

    /**
     * Set label_width
     * @param string $labelWidth
     * @return \Lof\BarcodeLabel\Api\Data\LabelInterface
     */
    public function setLabelWidth($labelWidth)
    {
        return $this->setData(self::LABEL_WIDTH, $labelWidth);
    }

    /**
     * Get label_height
     * @return string|null
     */
    public function getLabelHeight()
    {
        return $this->_get(self::LABEL_HEIGHT);
    }

    /**
     * Set label_height
     * @param string $labelHeight
     * @return \Lof\BarcodeLabel\Api\Data\LabelInterface
     */
    public function setLabelHeight($labelHeight)
    {
        return $this->setData(self::LABEL_HEIGHT, $labelHeight);
    }

    /**
     * Get font_size
     * @return string|null
     */
    public function getFontSize()
    {
        return $this->_get(self::FONT_SIZE);
    }

    /**
     * Set font_size
     * @param string $fontSize
     * @return \Lof\BarcodeLabel\Api\Data\LabelInterface
     */
    public function setFontSize($fontSize)
    {
        return $this->setData(self::FONT_SIZE, $fontSize);
    }

    /**
     * Get margin_top
     * @return string|null
     */
    public function getMarginTop()
    {
        return $this->_get(self::MARGIN_TOP);
    }

    /**
     * Set margin_top
     * @param string $marginTop
     * @return \Lof\BarcodeLabel\Api\Data\LabelInterface
     */
    public function setMarginTop($marginTop)
    {
        return $this->setData(self::MARGIN_TOP, $marginTop);
    }

    /**
     * Get margin_left
     * @return string|null
     */
    public function getMarginLeft()
    {
        return $this->_get(self::MARGIN_LEFT);
    }

    /**
     * Set margin_left
     * @param string $marginLeft
     * @return \Lof\BarcodeLabel\Api\Data\LabelInterface
     */
    public function setMarginLeft($marginLeft)
    {
        return $this->setData(self::MARGIN_LEFT, $marginLeft);
    }

    /**
     * Get margin_right
     * @return string|null
     */
    public function getMarginRight()
    {
        return $this->_get(self::MARGIN_RIGHT);
    }

    /**
     * Set margin_right
     * @param string $marginRight
     * @return \Lof\BarcodeLabel\Api\Data\LabelInterface
     */
    public function setMarginRight($marginRight)
    {
        return $this->setData(self::MARGIN_RIGHT, $marginRight);
    }

    /**
     * Get margin_bottom
     * @return string|null
     */
    public function getMarginBottom()
    {
        return $this->_get(self::MARGIN_BOTTOM);
    }

    /**
     * Set margin_bottom
     * @param string $marginBottom
     * @return \Lof\BarcodeLabel\Api\Data\LabelInterface
     */
    public function setMarginBottom($marginBottom)
    {
        return $this->setData(self::MARGIN_BOTTOM, $marginBottom);
    }

    /**
     * Get product_attribute
     * @return string|null
     */
    public function getProductAttribute()
    {
        return $this->_get(self::PRODUCT_ATTRIBUTE);
    }

    /**
     * Set product_attribute
     * @param string $productAttribute
     * @return \Lof\BarcodeLabel\Api\Data\LabelInterface
     */
    public function setProductAttribute($productAttribute)
    {
        return $this->setData(self::PRODUCT_ATTRIBUTE, $productAttribute);
    }
}
