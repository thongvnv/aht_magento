<?php

namespace THONGNH\ProductsInCategory\Controller\Adminhtml;

use Magento\Backend\App\Action;

abstract class Product extends Action
{
    protected function _initAction()
    {
        $this->_view->loadLayout();
        $this->_setActiveMenu(
            'THONGNH_ProductsInCategory::thongproduct'
        )->_addBreadcrumb(
            __('Product'),
            __('Product In Category')
        );
        return $this;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('THONGNH_ProductsInCategory::thongproduct');
    }
}
