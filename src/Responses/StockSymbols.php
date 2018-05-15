<?php

namespace DPRMC\IEXTrading\Responses;


class StockSymbols extends IEXTradingResponse {

    public $symbols;


    public function __construct($response) {
        $jsonString = (string) $response->getBody();
        $symbols    = \GuzzleHttp\json_decode($jsonString, true);

        foreach ($symbols as $symbol):
            $this->symbols[] = $symbol;
        endforeach;
    }

}