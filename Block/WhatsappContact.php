<?php
/**
 * *
 *  * Magepow
 *  * @category    Magepow
 *  * @copyright   Copyright (c) 2021 Magepow (http://www.magepow.com/)
 *  * @license     http://www.magepow.com/license-agreement.html
 *  * @Author: Benjamin
 *  * @@Create Date: 11/05/21 2:42 PM
 *  * @@Modify Date: 11/26/21 2:40 PM
 *
 */
namespace Magepow\WhatsappContact\Block;

class WhatsappContact extends \Magento\Framework\View\Element\Template
{
    protected $registry;
    protected $helper;
    protected $priceHelper;
    protected $collectionFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magepow\WhatsappContact\Helper\Data $helper,
        \Magepow\WhatsappContact\Model\ResourceModel\Whatsappcontact\CollectionFactory $collectionFactory,
        array $data = []
    ) {
        $this->helper    = $helper;
        $this->registry = $registry;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }
   
    public function getUrlKey()
    {
        $data = [];

        try {
            $collection = $this->collectionFactory->create()
                ->addFieldToFilter('active', ['eq' => '1']);

            if ($collection->count() > 0) {
                foreach ($collection as $account) {
                    $number = '+' . $account['person_number'];

                    if (preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])) {
                        $url['url'] = "https://wa.me/".$number."/?text=".$account['default_message'];
                    } else {
                        $url['url'] = "https://web.whatsapp.com/send?l=en&phone=" . $number . "&text=" . $account['default_message'];
                    }
                    $url['name'] = $account['person_name'];
                    $url['image'] = $account['person_image'];
                    $url['department'] = $account['department_name'];
                    $url['default_msg'] = $account['default_message'];
                    array_push($data, $url);
                }
            }else{
                $url['url']='';
                $url['name']='';
                $url['image']='';
                $url['department']='';
                $url['default_msg']='';
                array_push($data, $url);
            }
        }catch (\Exception $e){
            $this->config->printLog($e->getMessage());
        }
        return $data;
    }
}
