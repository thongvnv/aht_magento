<?php

namespace AHT\Customer\Controller\Adminhtml;

use Magento\Backend\App\Action;

abstract class User extends Action
{
    protected function _initAction()
    {
        $this->_view->loadLayout();
        $this->_setActiveMenu(
            'AHT_Customer::ahtcustomer'
        )->_addBreadcrumb(
            __('Customer'),
            __('Customer')
        );
        return $this;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('AHT_Customer::ahtcustomer');
    }
}
