<?php

namespace THONGNH\Post\Api;

interface ContactRepositoryInterface
{
    /**
     * Save Contact.
     *
     * @param \THONGNH\Post\Api\Data\ContactInterface $Contact
     * @return \THONGNH\Post\Api\Data\ContactInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\THONGNH\Post\Api\Data\ContactInterface $Contact);

    /**
     * Retrieve Contact.
     *
     * @param int $ContactId
     * @return \THONGNH\Post\Api\Data\ContactInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($ContactId);

    /**
     * Retrieve Contacts matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \THONGNH\Post\Api\Data\ContactSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    // public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete Contact.
     *
     * @param \THONGNH\Post\Api\Data\ContactInterface $Contact
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\THONGNH\Post\Api\Data\ContactInterface $Contact);

    /**
     * Delete Contact by ID.
     *
     * @param int $ContactId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($ContactId);
}
