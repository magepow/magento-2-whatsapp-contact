<?php
/**
 * *
 *  * Magepow
 *  * @category    Magepow
 *  * @copyright   Copyright (c) 2021 Magepow (http://www.magepow.com/)
 *  * @license     http://www.magepow.com/license-agreement.html
 *  * @Author: Benhamin
 *  * @@Create Date: 11/05/21 2:42 PM
 *  * @@Modify Date: 11/26/21 2:40 PM
 *
 */
namespace Magepow\WhatsappContact\Model\Config\Source;

class Devices implements \Magento\Framework\Option\ArrayInterface
{   
    /**
     * 
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => '0', 'label' => __('Desktop Only')],
            ['value' => '1', 'label' => __('Mobile Only')],
            ['value' => '2', 'label' => __('Desktop/Mobile')]
        ];
    }
}
