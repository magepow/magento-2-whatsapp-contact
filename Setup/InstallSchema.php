<?php
 
namespace Magepow\WhatsappContact\Setup;
 
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
 
class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        $tableName = $installer->getTable('magepow_whatsapp');
        //Check for the existence of the table
        if ($installer->getConnection()->isTableExists($tableName) != true) {
            $table = $installer->getConnection()
                ->newTable($tableName)
                           ->addColumn(
                    'id',
                    Table::TYPE_INTEGER,
                    null,
                    ['identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true],
                    'ID'
                )
                ->addColumn(
                    'person_name',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => true],
                    'Contact Name'
                )
                ->addColumn(
                    'department_name',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => true],
                    'Department Name'
                )
                ->addColumn(
                    'person_number',
                    Table::TYPE_TEXT,
                    20,
                    ['nullable' => true],
                    'Contact Number'
                )
                ->addColumn(
                    'default_message',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => true],
                    'Default Message'
                )
                ->addColumn(
                    'person_image',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => true],
                    'Image'
                )
                ->addColumn(
                    'active',
                    Table::TYPE_INTEGER,
                    1,
                    ['nullable' => false, 'default' => 0],
                    'Active'
                )
                //Set comment for magepow_whatsappcontact table
                ->setComment('Magepow Whatsapp Table')
                //Set option for magepow_whatsappcontact table
                ->setOption('type', 'InnoDB')
                ->setOption('charset', 'utf8');
            $installer->getConnection()->createTable($table);
        }
        $installer->endSetup();
    }
}