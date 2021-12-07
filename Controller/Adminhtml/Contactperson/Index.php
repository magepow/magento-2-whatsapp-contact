<?php

namespace Magepow\WhatsappContact\Controller\Adminhtml\Contactperson;

use Magento\Backend\App\Action;
use Magento\Framework\Exception\LocalizedException;

class Index extends Action
{
    protected $resultPageFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        try {
            $resultPage = $this->resultPageFactory->create();
            $resultPage->setActiveMenu('Magepow_WhatsappContact::whatsappcontact');
            $resultPage->getConfig()->getTitle()->prepend(__('Manage WhatsApp Chat'));
            return $resultPage;
        } catch (\Exception $e) {
            $this->messageManager->addError($e->getMessage());
        }
    }

    protected function _isAllowed()
    {
        return true;
    }
}
