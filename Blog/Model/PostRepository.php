<?php

namespace THONGNH\Blog\Model;

use THONGNH\Blog\Api\Data;
use THONGNH\Blog\Api\PostRepositoryInterface;
use THONGNH\Blog\Model\ResourceModel\Post as ResourcePost;
use THONGNH\Blog\Model\ResourceModel\Post\CollectionFactory as PostCollectionFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class PostRepository
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class PostRepository implements PostRepositoryInterface
{
    /**
     * @var ResourcePost
     */
    protected $resource;

    /**
     * @var PostFactory
     */
    protected $PostFactory;

    /**
     * @var PostCollectionFactory
     */
    protected $PostCollectionFactory;

    /**
     * @var Data\PostSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;
    /**
     * @param ResourcePost $resource
     * @param PostFactory $PostFactory
     * @param Data\PostInterfaceFactory $dataPostFactory
     * @param PostCollectionFactory $PostCollectionFactory
     * @param Data\PostSearchResultsInterfaceFactory $searchResultsFactory
     */
    private $collectionProcessor;

    public function __construct(
        ResourcePost $resource,
        PostFactory $PostFactory,
        Data\PostInterfaceFactory $dataPostFactory,
        PostCollectionFactory $PostCollectionFactory
    ) {
        $this->resource = $resource;
        $this->PostFactory = $PostFactory;
        $this->PostCollectionFactory = $PostCollectionFactory;
        // $this->searchResultsFactory = $searchResultsFactory;
        // $this->collectionProcessor = $collectionProcessor ?: $this->getCollectionProcessor();
    }

    /**
     * Save Post data
     *
     * @param \THONGNH\Blog\Api\Data\PostInterface $Post
     * @return Post
     * @throws CouldNotSaveException
     */
    public function save(\THONGNH\Blog\Api\Data\PostInterface $Post)
    {
        try {
            $this->resource->save($Post);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the Post: %1', $exception->getMessage()),
                $exception
            );
        }
        return $Post;
    }

    /**
     * Load Post data by given Post Identity
     *
     * @param string $PostId
     * @return Post
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($PostId)
    {
        $Post = $this->PostFactory->create();
        $Post->load($PostId);
        if (!$Post->getId()) {
            throw new NoSuchEntityException(__('The CMS Post with the "%1" ID doesn\'t exist.', $PostId));
        }
        return $Post;
    }

    /**
     * Load Post data collection by given search criteria
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return \THONGNH\Blog\Api\Data\PostSearchResultsInterface
     */
    public function getList()
    {
        /** @var \THONGNH\Blog\Model\ResourceModel\Post\Collection $collection */
        $collection = $this->PostCollectionFactory->create();
        return $collection;
    }

    /**
     * Delete Post
     *
     * @param \THONGNH\Blog\Api\Data\PostInterface $Post
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(\THONGNH\Blog\Api\Data\PostInterface $Post)
    {
        try {
            $this->resource->delete($Post);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Post: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * Delete Post by given Post Identity
     *
     * @param string $PostId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($PostId)
    {
        return $this->delete($this->getById($PostId));
    }
}
