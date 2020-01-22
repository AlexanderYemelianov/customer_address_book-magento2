<?php


namespace Customer\AddressBook\Resource\AddressBook;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct() {
        $this->_init(
            'Customer\AddressBook\Model\AddressBook',
            'Customer\AddressBook\Resource\AddressBook'
        );
    }
}