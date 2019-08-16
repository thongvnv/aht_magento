<?php

namespace THONGNH\Post\Model\ResourceModel\Contact;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'contact_id';
    protected $_eventPrefix = 'aht_blog_contact_collection';
    protected $_eventObject = 'contact_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('THONGNH\Post\Model\Contact', 'THONGNH\Post\Model\ResourceModel\Contact');
    }
}