# Magento 2 Module Lof BarcodeLabel

    ``landofcoder/module-barcodelabel``

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)

## Main Functionalities
POS Barcode Label for Magento 2: Using this POS add-on, the store owner can design customized barcode labels/stickers for products. Display price, product name, logo, date, product custom attribute on the barcode labels. The admin can multi-select barcode labels and preview them before printing.

## Installation
\* = in production please use the `--keep-generated` option


### Type 1: Composer (Recommended)

 - Install the module composer by running `composer require landofcoder/module-barcodelabel`
 - enable the module by running `php bin/magento module:enable Lof_BarcodeLabel Lof_BarcodeInventory`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Generate static files by running `php bin/magento setup:static-content:deploy -f`
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Zip file

 - Unzip the zip file in `app/code/Lof`
 - Enable the module by running `php bin/magento module:enable Lof_BarcodeLabel Lof_BarcodeInventory`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Generate static files by running `php bin/magento setup:static-content:deploy -f`
 - Flush the cache by running `php bin/magento cache:flush`
