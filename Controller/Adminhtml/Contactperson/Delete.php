<?php

namespace Magepow\WhatsappContact\Controller\Adminhtml\Contactperson;

class Delete extends \Magento\Backend\App\Action
{
    protected $modelFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magepow\WhatsappContact\Model\Whatsappcontact $modelFactory
    ) {
        $this->modelFactory = $modelFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        if ($this->getRequest()->getParam('id') > 0) {
            try {
                $model = $this->modelFactory->load($this->getRequest()->getParam('id'));
                $model->delete();
                $this->messageManager->addSuccess(__('WhatsAppContact was successfully deleted'));
                $this->_redirect('whatsappcontact/contactperson/index');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                $this->_redirect('whatsappcontact/contactperson/index');
            }
        }
        $this->_redirect('whatsappcontact/contactperson/index');
    }
}
