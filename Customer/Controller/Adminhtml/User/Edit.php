<?php

namespace AHT\Customer\Controller\Adminhtml\User;

class Edit extends \AHT\Customer\Controller\Adminhtml\User
{
    protected $_resultPageFactory;
    protected $_storeManager;
    protected $_customerFactory;
    protected $_resultFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Customer\Model\CustomerFactory $customerFactory,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Controller\ResultFactory $resultFactory
    )
    {
        $this->_resultPageFactory = $resultPageFactory;
        $this->_storeManager = $storeManager;
        $this->_customerFactory = $customerFactory;
        $this->_resultFactory = $resultFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        if (isset($_POST["createbtn"])) {
            // Get Website ID
            $websiteId  = $this->storeManager->getWebsite()->getWebsiteId();

            // Instantiate object (this is the most important part)
            $customer   = $this->customerFactory->create();
            $customer->setWebsiteId($websiteId);

            // Preparing data for new customer
            $customer->setFirstname($_POST['firstName']);
            $customer->setLastname($_POST['lastName']);
            $customer->setEmail($_POST['email']);
            $customer->setPassword($_POST['password']);
            $customer->setGender($_POST['gender']);

            // Save data
            $customer->save();

            // Redirect
            $resultRedirect = $this->_resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl("http://127.0.0.1/magento2/admin_1sbxbt/ahtcustomer/user/index");
            return $resultRedirect;
        }

        // View
        return $this->_resultPageFactory->create();
    }

}