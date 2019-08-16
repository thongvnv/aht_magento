<?php

namespace THONGNH\Post\Api\Data;

interface ContactSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Post list.
     * @return \AHT\THONGNH\Api\Data\PostInterface[]
     */
    public function getItems();

    /**
     * Set name list.
     * @param \AHT\THONGNH\Api\Data\PostInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}