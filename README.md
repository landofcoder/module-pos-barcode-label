# Mage2 Module Lof BarcodeLabel

    ``landofcoder/module-pos-barcode-label``

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)

## Main Functionalities
POS Barcode Label for Magento 2: Using this POS add-on, the store owner can design customized barcode labels/stickers for products. Display price, product name, logo, date, product custom attribute on the barcode labels. The admin can multi-select barcode labels and preview them before printing.

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/Lof`
 - Enable the module by running `php bin/magento module:enable Lof_BarcodeLabel`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require landofcoder/module-pos-barcode-label`
 - enable the module by running `php bin/magento module:enable Lof_BarcodeLabel`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`
