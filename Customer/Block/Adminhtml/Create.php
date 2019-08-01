<?php

namespace THONGNH\Customer\Block\Adminhtml;

use Magento\Backend\Block\Template;

class Create extends Template
{
    protected $_urlBuilder;
    protected $_request;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\UrlInterface $urlBuilder
    )
    {
        $this->_urlBuilder = $urlBuilder;
        parent::__construct($context);
    }

    public function getUrlBuilder()
    {
        return $this->_urlBuilder;
    }
}