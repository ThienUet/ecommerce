<?php

namespace Extension\Currency\Model;

class Currency extends \Magento\Framework\Model\AbstractModel
{
    const REQUEST_TIMEOUT = 5000;

    const API_URL = 'https://portal.vietcombank.com.vn/Usercontrols/TVPortal.TyGia/pXML.aspx?b=10';

    private $response;

    private $curlFactory;

    private $xmlParser;

    public function __construct(
        \Magento\Framework\HTTP\Client\CurlFactory $curlFactory,
        \Magento\Framework\Xml\Parser $xmlParser
    ) {
        $this->curlFactory = $curlFactory;
        $this->xmlParser = $xmlParser;
    }

    public function getCurrencyData()
    {
        if (!$this->response) {
            $this->response = (object) $this->xmlParser->loadXML($this->getResponse())->xmlToArray();
        }

        return $this->response;
    }

    private function getResponse()
    {
        $client = $this->curlFactory->create();
        $client->setTimeout(self::REQUEST_TIMEOUT);
        $client->get(self::API_URL);

        return $client->getBody();
    }
}
