<?php

namespace Lof\BarcodeLabel\Ui\Component\Listing\Column;

class Status extends \Magento\Ui\Component\Listing\Columns\Column
{
    /**
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        $statuses = [
            'active' => __('ACTIVE'),
            'inactive' => __('INACTIVE')
        ];

        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $status = $item[$this->getData('name')];
                $item[$this->getData('name')] = $statuses[$status];
            }
        }

        return $dataSource;
    }
}
