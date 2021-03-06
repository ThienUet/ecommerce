<?php

namespace Extension\Currency\Controller\Index;

use \Magento\Framework\App\Action\Action;
use \Magento\Framework\View\Result\PageFactory;
use \Magento\Framework\App\Action\Context;

class Index extends Action
{
    protected $resultPageFactory;

    public function __construct(Context $context, PageFactory $resultPageFactory) 
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }
}
