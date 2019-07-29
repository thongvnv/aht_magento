<?php

namespace AHT\Customer\Block\Adminhtml;

use Magento\Backend\Block\Template;

class Create extends Template
{
    protected $_customerCollection;
    protected $_urlBuilder;
    protected $_request;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Customer\Model\ResourceModel\Customer\CollectionFactory $customerCollectionFactory,
        \Magento\Framework\UrlInterface $urlBuilder,
        \Magento\Framework\App\Request\Http $request
    )
    {
        $this->_customerCollection = $customerCollectionFactory->create();
        $this->_urlBuilder = $urlBuilder;
        $this->_request = $request;
        parent::__construct($context);
    }

    public function getUrlBuilder()
    {
        return $this->_urlBuilder;
    }

    public function getCustomer()
    {
        return $this->_customerCollection->getItemById($this->_request->getParam('id'));
    }

}