<?php

namespace THONGNH\Customer\Controller\Adminhtml\User;

class Edit extends \THONGNH\Customer\Controller\Adminhtml\User
{
    protected $_resultPageFactory;
    protected $_customerRepository;
    protected $_resultFactory;
    protected $_encryptor;
    protected $_urlBuilder;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository,
        \Magento\Framework\Encryption\Encryptor $encryptor,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\UrlInterface $urlBuilder,
        \Magento\Framework\Controller\ResultFactory $resultFactory
    )
    {
        $this->_resultPageFactory = $resultPageFactory;
        $this->_customerRepository = $customerRepository;
        $this->_encryptor = $encryptor;
        $this->_urlBuilder = $urlBuilder;
        $this->_resultFactory = $resultFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $isEdit = $this->getRequest()->getParam("editbtn");
        if (isset($isEdit)) {
            $customer = $this->_customerRepository->getById($this->getRequest()->getParam("id"));
            if ($customer == null) {
                echo "Customer not found!";
                exit;
            }
            // Preparing data for new customer
            $customer->setFirstname($this->getRequest()->getParam("firstName"));
            $customer->setLastname($this->getRequest()->getParam("lastName"));
            $customer->setGender($this->getRequest()->getParam("gender"));

            // Save data
            $passwordHash = $this->_encryptor->getHash($this->getRequest()->getParam("password"), true);
            $this->_customerRepository->save($customer, $passwordHash);

            // Redirect
            $resultRedirect = $this->_resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl($this->_urlBuilder->getUrl('ahtcustomer/user/index'));
            return $resultRedirect;
        }

        // View
        return $this->_resultPageFactory->create();
    }

}