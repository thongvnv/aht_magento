<?php

namespace THONGNH\Blog\Block;

class Index extends \Magento\Framework\View\Element\Template
{
    private $postFactory;
    private $postRepository;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \THONGNH\Blog\Model\PostRepository $postRepository,
        \THONGNH\Blog\Model\PostFactory $postFactory
    ) {
        parent::__construct($context);
        $this->postFactory = $postFactory;
        $this->postRepository = $postRepository;
    }

    public function getBlogInfo()
    {
        return __('THONGNH Blog module');
    }

    public function getPosts()
    {
        $collection = $this->postRepository->getList();
        // $collection = $post->getCollection();
        return $collection;
    }
}
