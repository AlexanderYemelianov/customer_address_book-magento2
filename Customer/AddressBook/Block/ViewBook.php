<?php


namespace Customer\AddressBook\Block;


use Customer\AddressBook\Model\AddressBookFactory;
use Magento\Customer\Model\Session;
use Magento\Framework\View\Element\Template;

class ViewBook extends Template
{
    /**
     * @var AddressBookFactory
     */
    private $addressBookFactory;
    /**
     * @var Session
     */
    private $session;

    public function __construct(Template\Context $context,
                                AddressBookFactory $addressBookFactory,
                                Session $session)
    {
        $this->addressBookFactory = $addressBookFactory;
        $this->session = $session;
        parent::__construct($context);
    }

    /**
     * @return array|mixed
     */
    public function getAddressBookByCustomerId()
    {
        $abbBook = $this->addressBookFactory->create();
        $customerId = $this->session->getId();
        $data = $abbBook->load($customerId, 'customer_id');
        return $data->getData() ?? [];
    }
}