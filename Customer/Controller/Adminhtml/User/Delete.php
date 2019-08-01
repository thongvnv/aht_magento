<?php

namespace THONGNH\Customer\Controller\Adminhtml\User;

class Delete extends \THONGNH\Customer\Controller\Adminhtml\User
{
    protected $_customerRepository;
    protected $_urlBuilder;
    protected $_resultFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository,
        \Magento\Framework\UrlInterface $urlBuilder,
        \Magento\Framework\Controller\ResultFactory $resultFactory
    )
    {
        $this->_customerRepository = $customerRepository;
        $this->_urlBuilder = $urlBuilder;
        $this->_resultFactory = $resultFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $customerId = $this->getRequest()->getParam("id");
        $isDeleted = $this->_customerRepository->deleteById($customerId);
        if (!$isDeleted) {
            echo "Error!";
            exit;
        }

        // Redirect
        $resultRedirect = $this->_resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_urlBuilder->getUrl('ahtcustomer/user/index'));
        return $resultRedirect;
    }
}