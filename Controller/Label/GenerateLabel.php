<?php

namespace Lof\BarcodeLabel\Controller\Label;

use Lof\BarcodeInventory\Helper\Data;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\UrlInterface;
use Picqer\Barcode\BarcodeGeneratorPNG;

class GenerateLabel extends \Magento\Framework\App\Action\Action
{
    /**
     * @var Data
     */
    private $_helper;

    /**
     * @var UrlInterface
     */
    private $urlBuilder;

    /**
     * GenerateLabel constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\Json\Helper\Data $jsonHelper
     * @param Data $helper
     * @param UrlInterface $urlBuilder
     * @param \Magento\Framework\View\Result\PageFactory $resultFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Json\Helper\Data $jsonHelper,
        \Lof\BarcodeInventory\Helper\Data $helper,
        UrlInterface $urlBuilder,
        \Magento\Framework\View\Result\PageFactory $resultFactory
    ) {
        $this->jsonHelper = $jsonHelper;
        $this->resultFactory = $resultFactory;
        $this->_helper = $helper;
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Raw|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        /** @var \Magento\Framework\Controller\Result\Raw $response */
        $response = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $response->setHeader('Content-type', 'text/plain');
        $data = $this->getRequest()->getParams();
        $generator = new BarcodeGeneratorPNG();
        $str = '';
        if ($this->_helper->getDesignConfig('display_logo') == '1') {
            $width = $this->_helper->getDesignConfig('logo_width');
            $height = $this->_helper->getDesignConfig('logo_height');
            $url = str_replace("/index.php/", "/", $this->urlBuilder->getBaseUrl());
            $logo = $this->_helper->getDesignConfig('logo');
            $str .= "<div class = 'row'><img width='$width' height='$height' src='" . $url . "media/lof/barcode_logo/" . $logo . "' alt='logo'></div>";
        }
        $str .= "<div class = 'row'><b>Joust Duffle Bag</b></div>";
        $str .= '<img width = "100%" src="data:image/png;base64,' . base64_encode($generator->getBarcode(
            '12345678',
            $generator::TYPE_CODE_128
        )) . '">';
        $str .= "<div class = 'row'><b>12345678</b></div>";
        $str .= "<div class = 'row'><b>$34.00</b></div>";
        $attributes = $data['product_attribute'];
        foreach ($attributes as $item) {
            $str .= "<div class = 'row'><b>$item</b></div>";
        }
        $str = "<div class=\"barcode_paper\">$str</div>";
        $string = '';
        for ($i = 0; $i < 10; $i++) {
            $string .= $str;
        }
        $css = $this->_helper->getDesignConfig('barcode_label_css');
        $width = $data['label_width'];
        $height = $data['label_height'];
        $font = $data['font_size'];
        $margin = $data['margin_top'] . " " . $data['margin_right'] . " " . $data['margin_bottom'] . " " . $data['margin_left'];
        $css = "$css .barcode_paper {width:$width; height: $height; margin: $margin; font-size: $font; float:left }";
        $string .= "<style type='text/css'>$css</style>";
        $response->setContents(
            $this->jsonHelper->jsonEncode(
                [
                    'data1' => $string,
                ]
            )
        );

        return $response;
    }
}
