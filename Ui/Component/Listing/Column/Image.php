<?php

namespace Magepow\WhatsappContact\Ui\Component\Listing\Column;

class Image extends \Magento\Ui\Component\Listing\Columns\Column
{
    protected $systemStore;
    protected $storeManager;
    protected $helper;
    protected $customer;
    protected $escaper;

    public function __construct(
        \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
        \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory,
        \Magento\Customer\Model\Customer $customer,
        \Magento\Framework\Escaper $escaper,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $components = [],
        array $data = []
    ) {
        $this->customer = $customer;
        $this->escaper = $escaper;
        $this->storeManager = $storeManager;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }
    public function prepareDataSource(array $dataSource){
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as $item) {
                if ($item['person_image'] != '' || $item['person_image'] != null):
                    $status= '<div><img src="'.$item['person_image'].'" width="100px" height="100px" alt="product-img"/></div>';
                    $item['person_image'] = $status;
                endif;
            }
        }
        return $dataSource;
    }
}
