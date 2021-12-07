<?php

namespace Magepow\WhatsappContact\Controller\Adminhtml\Contactperson;

use Magento\Framework\Controller\ResultFactory;

class MassDelete extends \Magento\Backend\App\Action
{
    protected $filter;
    protected $collectionFactory;
    protected $whatsappContact;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Ui\Component\MassAction\Filter $filter,
        \Magepow\WhatsappContact\Model\ResourceModel\Whatsappcontact\CollectionFactory $collectionFactory,
        \Magepow\WhatsappContact\Model\Whatsappcontact $whatsappcontact
    )
    {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->whatsappContact = $whatsappcontact;
        parent::__construct($context);
    }

    public function execute()
    {
        try {
            $collection = $this->filter->getCollection($this->collectionFactory->create());
            $collectionSize = $collection->getSize();

            foreach ($collection as $item) {
                $id = $item['id'];
                $row = $this->whatsappContact->load($id);
                $row->delete();
            }
            $this->messageManager->addSuccess(__('A total of %1 record(s) have been deleted.', $collectionSize));
        } catch (\Exception $e) {
            $this->messageManager->addError($e->getMessage());
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('*/*/');
    }
    protected function _isAllowed()
    {
        return true;
    }
}
