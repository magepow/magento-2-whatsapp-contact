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
namespace Magepow\WhatsappContact\Model\Config\Source;

class Button implements \Magento\Framework\Option\ArrayInterface
{   
    /**
     * 
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'icon', 'label' => __('Icon')],
            ['value' => 'chatbox', 'label' => __('Chat Box')]
        ];
    }
}
