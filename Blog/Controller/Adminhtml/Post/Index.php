<?php

namespace THONGNH\Blog\Controller\Adminhtml\Post;

class Index extends \THONGNH\Blog\Controller\Adminhtml\Post
{

    public function execute()
    {
        $this->_initAction();
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__('Posts'));
        $this->_view->renderLayout();
    }

}