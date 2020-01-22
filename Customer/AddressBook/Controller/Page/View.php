<?php

namespace Customer\AddressBook\Controller\Page;


use Customer\AddressBook\Model\AddressBookFactory;
use \Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use \Magento\Framework\View\Result\PageFactory;
use \Magento\Customer\Model\Session;

class View extends \Magento\Framework\App\Action\Action
{
    /**
     * @var PageFactory
     */
    private $resultPageFactory;
    /**
     * @var AddressBookFactory
     */
    private $addressBook;

    /**
     * @var Session
     */
    private $session;

    /**
     * View constructor.
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param AddressBookFactory $addressBook
     * @param Session $session
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        AddressBookFactory $addressBook,
        Session $session
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->addressBook = $addressBook;
        $this->session = $session;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        if (!$this->session->isLoggedIn()) {
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl('/customer/account/login');
            return $resultRedirect;
        }
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Customer: Address book '));
        $this->_view->loadLayout();
        $this->_view->renderLayout();
        return $resultPage;
    }
}