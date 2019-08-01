<?php

namespace THONGNH\Customer\Controller\Adminhtml\User;

class Create extends \THONGNH\Customer\Controller\Adminhtml\User
{
    protected $_resultPageFactory;
    protected $_storeManager;
    protected $_customerFactory;
    protected $_resultFactory;
    protected $_urlBuilder;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Customer\Model\CustomerFactory $customerFactory,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Controller\ResultFactory $resultFactory,
        \Magento\Framework\UrlInterface $urlBuilder
    )
    {
        $this->_resultPageFactory = $resultPageFactory;
        $this->_storeManager = $storeManager;
        $this->_customerFactory = $customerFactory;
        $this->_resultFactory = $resultFactory;
        $this->_urlBuilder = $urlBuilder;
        parent::__construct($context);
    }

    public function execute()
    {
        $isCreate = $this->getRequest()->getParam("createbtn");

        if (isset($isCreate)) {
            // Get Website ID
            $websiteId = $this->_storeManager->getWebsite()->getWebsiteId();

            // Instantiate object (this is the most important part)
            $customer = $this->_customerFactory->create();
            $customer->setWebsiteId($websiteId);

            // Preparing data for new customer
            $customer->setFirstname($this->getRequest()->getParam("firstName"));
            $customer->setLastname($this->getRequest()->getParam("lastName"));
            $customer->setEmail($this->getRequest()->getParam("email"));
            $customer->setPassword($this->getRequest()->getParam("password"));
            $customer->setGender($this->getRequest()->getParam("gender"));

            // Save data
            $customer->save();

            // Redirect
            $resultRedirect = $this->_resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl($this->_urlBuilder->getUrl('ahtcustomer/user/index'));
            return $resultRedirect;
        }

        return $this->_resultPageFactory->create();
    }

}