<?php

namespace THONGNH\Customer\Controller\Adminhtml;

use Magento\Backend\App\Action;

abstract class User extends Action
{
    protected function _initAction()
    {
        $this->_view->loadLayout();
        $this->_setActiveMenu(
            'THONGNH_Customer::ahtcustomer'
        )->_addBreadcrumb(
            __('Customer'),
            __('Customer')
        );
        return $this;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('THONGNH_Customer::ahtcustomer');
    }
}
