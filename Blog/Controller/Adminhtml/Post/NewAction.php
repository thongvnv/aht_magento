<?php

namespace THONGNH\Blog\Controller\Adminhtml\Post;

class NewAction extends \THONGNH\Blog\Controller\Adminhtml\Post
{
    public function execute()
    {
        $this->_forward('edit');
    }
}