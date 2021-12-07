<?php

namespace Magepow\WhatsappContact\Controller\Adminhtml\Contactperson;

use Magento\Framework\Controller\ResultFactory;

class AddNew extends \Magento\Backend\App\Action
{
    private $coreRegistry;
    private $gridFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magepow\WhatsappContact\Model\WhatsappcontactFactory $gridFactory
    ) {
        parent::__construct($context);
        $this->coreRegistry = $coreRegistry;
        $this->gridFactory = $gridFactory;
    }

    public function execute()
    {
        $rowId = (int)$this->getRequest()->getParam('id');
        try {
            $rowData = $this->gridFactory->create();
            if ($rowId) {
                $rowData = $rowData->load($rowId);
                $rowTitle = $rowData->getTitle();
                if (!$rowData->getId()) {
                    $this->messageManager->addError(__('row data no longer exist.'));
                    $this->_redirect('whatsappcontact/contactperson/index');
                    return;
                }
            }
            $this->coreRegistry->register('row_data', $rowData);
            $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
            $title = $rowId ? __('Edit Manager Information') . $rowTitle : __('Add New Manager');
            $resultPage->getConfig()->getTitle()->prepend($title);
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
