<?php


namespace Customer\AddressBook\Controller\Page;

use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;

class Save extends Action
{
    const VIEW_ADDRESS_BOOK_LINK = '/book/page/view';

    private $addressBook;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Customer\AddressBook\Model\AddressBookFactory $addressBook
    )
    {
        $this->addressBook = $addressBook;
        parent::__construct($context);
    }

    public function execute()
    {
        $post = (array)$this->getRequest()->getParams();
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        if (!empty($post)) {
            $abbBook = $this->addressBook->create();
            $abbBook->setData($post)->save();
            $resultRedirect->setUrl(self::VIEW_ADDRESS_BOOK_LINK);
            return $resultRedirect;
        }
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        return $resultRedirect;
    }
}