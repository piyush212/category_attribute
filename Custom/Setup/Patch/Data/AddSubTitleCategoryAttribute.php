<?php

namespace NewTask\Custom\Setup\Patch\Data;

use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Catalog\Model\Category;


class AddSubTitleCategoryAttribute implements DataPatchInterface
{

    protected $_moduleDataSetup;
    protected $_eavSetupFactory;
 
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        EavSetupFactory $eavSetupFactory
    ) {
        $this->_moduleDataSetup = $moduleDataSetup;
        $this->_eavSetupFactory = $eavSetupFactory;
    }

    public function apply()
{
        /** @var EavSetup $eavSetup */
        $eavSetup = $this->_eavSetupFactory->create(['setup' => $this->_moduleDataSetup]);

        $eavSetup->addAttribute(Category::ENTITY, 'category_subtitle', [
            'type' => 'text',
            'label' => 'Sub Title',
            'input' => 'text',
            'default' => '',
            'sort_order' => 3,
            'global' => ScopedAttributeInterface::SCOPE_STORE,
            'group' => 'General Information',
            'visible_on_front' => true

            // 'type' => 'int',
            // 'label' => 'Piyush Title',
            // 'input' => 'select',
            // 'source' => Boolean::class,
            // 'sort_order' => 2,
            // 'global' => ScopedAttributeInterface::SCOPE_STORE,
            // 'group' => 'General Information',
            // 'visible_on_front' => true
        ]);
    }

    public static function getDependencies()
    {
        return [];
    }
   
    public function getAliases()
    {
        return [];
    }
}