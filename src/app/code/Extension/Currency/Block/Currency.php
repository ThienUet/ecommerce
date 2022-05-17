<?php

namespace Extension\Currency\Block;

class Currency extends \Magento\Framework\View\Element\Template
{
    protected $messageManager;

    private $currencyFactory;

    public function getCurrencyRateInfo()
    {
        return $this->currencyFactory->create()->getCurrencyData();
    }

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Extension\Currency\Model\CurrencyFactory $currencyFactory,
        \Magento\Framework\Message\ManagerInterface $messageManager,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->currencyFactory = $currencyFactory;
        $this->messageManager = $messageManager;
    }
}
