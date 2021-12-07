<?php

namespace Magepow\WhatsappContact\Controller\Adminhtml\Contactperson;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\UrlInterface;

class Save extends \Magento\Backend\App\Action
{
    protected $gridFactory;
    protected $datetime;
    protected $fileUploaderFactory;
    protected $filesystem;
    protected $storeManager;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Stdlib\DateTime\DateTime $datetime,
        \Magepow\WhatsappContact\Model\WhatsappcontactFactory $gridFactory,
        \Magento\MediaStorage\Model\File\UploaderFactory $fileUploaderFactory,
        \Magento\Framework\Filesystem $filesystem,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    ) {
        parent::__construct($context);
        $this->datetime = $datetime;
        $this->gridFactory = $gridFactory;
        $this->fileUploaderFactory = $fileUploaderFactory;
        $this->filesystem = $filesystem;
        $this->storeManager = $storeManager;
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            $this->_redirect('whatsappcontact/contactperson/addrow');
            return;
        }

        $filename = "";
        try {
            if ($this->getRequest()->getFiles('person_image')['name'] && file_exists($this->getRequest()->getFiles('person_image')['tmp_name'])) {
                $uploader = $this->fileUploaderFactory->create(['fileId' => 'person_image']);
                $uploader->setAllowedExtensions(['jpg','jpeg','png','gif']);
                $uploader->setAllowRenameFiles(true);
                $uploader->setFilesDispersion(false);
                $path = $this->filesystem->getDirectoryRead(DirectoryList::MEDIA)->getAbsolutePath('whatsappcontact/');
                $result = $uploader->save($path);
                $filename .= $result['file'];

                $url = $this->storeManager->getStore()->getBaseUrl(UrlInterface::URL_TYPE_MEDIA).'/whatsappcontact/';

                $data['person_image'] = $url.$filename;
            } else {
                if (isset($data['person_image']) && isset($data['person_image']['value'])) {
                    if (isset($data['person_image']['delete'])) {
                        $data['person_image'] = '';
                        $data['delete_image'] = true;
                    } elseif (isset($data['person_image']['value'])) {
                        $data['person_image'] = $data['person_image']['value'];
                    } else {
                        $data['person_image'] = '';
                    }
                }
            }
        }
        catch (\Exception $e){
            $this->messageManager->addError($e->getMessage());
        }

        try {
            $rowData = $this->gridFactory->create();
            $rowData->setData($data);

            if (isset($data['id'])) {
                $rowData->setId($data['id']);
                $rowData->setPersonName($data['person_name']);
                $rowData->setDepartmentName($data['department_name']);
                $rowData->setPersonNumber($data['person_number']);
                $rowData->setDefaultMessage($data['default_message']);
                $rowData->setPersonImage($data['person_image']);
                $rowData->setActive($data['active']);
            }
            $rowData->save();
            $this->messageManager->addSuccess(__('WhatsappContact Number successfully saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addError($e->getMessage());
        }
        $this->_redirect('whatsappcontact/contactperson/index');
    }

    protected function _isAllowed()
    {
        return true;
    }
}
