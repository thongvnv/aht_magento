<?php

namespace THONGNH\Blog\Block;

class Create extends \Magento\Framework\View\Element\Template
{
    private $postFactory;
    private $postRepository;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \THONGNH\Blog\Model\PostFactory $postFactory,
        \THONGNH\Blog\Model\PostRepository $postRepository
    ) {
        parent::__construct($context);
        $this->postFactory = $postFactory;
        $this->postRepository = $postRepository;
    }
}
