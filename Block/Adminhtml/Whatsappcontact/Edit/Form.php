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
namespace Magepow\WhatsappContact\Block\Adminhtml\Whatsappcontact\Edit;

class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    protected $systemStore;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        array $data = []
    )
    {
        $this->_wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('row_data');

        $form = $this->_formFactory->create(
            ['data' => [
                'id' => 'edit_form',
                'enctype' => 'multipart/form-data',
                'action' => $this->getData('action'),
                'method' => 'post'
            ]
            ]
        );

        $form->setHtmlIdPrefix('wkgrid_');
        if ($model->getId()) {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Manager Information'), 'class' => 'fieldset-wide']
            );
            $fieldset->addField('id', 'hidden', ['name' => 'id']);
        } else {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Manager Information'), 'class' => 'fieldset-wide']
            );
        }

        $fieldset->addField(
            'person_name',
            'text',
            [
                'name' => 'person_name',
                'label' => __('Name'),
                'id' => 'person_name',
                'title' => __('Name'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'department_name',
            'text',
            [
                'name' => 'department_name',
                'label' => __('Department Name'),
                'id' => 'department_name',
                'title' => __('Department Name'),
                'class' => 'required-entry',
                'required' => true,
                'note' => '',
            ]
        );

        $fieldset->addField(
            'person_number',
            'text',
            [
                'name' => 'person_number',
                'label' => __('Mobile Number'),
                'id' => 'person_number',
                'title' => __('Mobile Number'),
                'class' => 'required-entry',
                'required' => true,
                'note' => 'Enter number with country code. (+1) for United States.',
            ]
        );

        $fieldset->addField(
            'default_message',
            'text',
            [
                'name' => 'default_message',
                'label' => __('Default Message'),
                'id' => 'default_message',
                'title' => __('Default Message'),
                'required' => false,
                'note' => '',
            ]
        );

        $fieldset->addField(
            'person_image',
            'image',
            [
                'name' => 'person_image',
                'label' => __('Photo'),
                'id' => 'person_image',
                'title' => __('Photo'),
                'note' => 'Allow image type: jpg, jpeg, gif, png',
            ]
        );

        $fieldset->addField(
            'active',
            'select',
            [
                'name' => 'active',
                'label' => __('Status'),
                'id' => 'active',
                'title' => __('Status'),
                'class' => 'input-select',
                'options' => ['1' => __('Active'), '0' => __('Inactive')]
            ]
        );

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
    }
}
