<?php


namespace Customer\AddressBook\Setup;


use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{

    /**
     * Installs data for a module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $data = [
            [
                'first_name' => 'test',
                'last_name' => 'test',
                'phone_number' => '0983808141',
                'customer_id' => 1
            ]
        ];

        foreach ($data as $bind) {
            $setup->getConnection()
                ->insertForce($setup->getTable('address_book'), $bind);
        }
    }
}