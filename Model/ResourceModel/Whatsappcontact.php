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
namespace Magepow\WhatsappContact\Model\ResourceModel;

class Whatsappcontact extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('magepow_whatsapp', 'id');
    }
}
