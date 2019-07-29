<?php

namespace AHT\Customer\Block\Adminhtml;

use Magento\Backend\Block\Template;

class User extends Template
{
    protected $_customerFactory;
    protected $_urlBuilder;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Customer\Model\ResourceModel\Customer\CollectionFactory $customerCollectionFactory,
        \Magento\Framework\UrlInterface $urlBuilder
    )
    {
        $this->_customerFactory = $customerCollectionFactory;
        $this->_urlBuilder = $urlBuilder;
        parent::__construct($context);
    }

    public function getUrlBuilder()
    {
        return $this->_urlBuilder;
//        return "Hello User";
    }

    public function getCustomerCollection()
    {
        return $this->_customerFactory->create();
    }

}