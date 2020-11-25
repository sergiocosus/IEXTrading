<?php

namespace DPRMC\IEXTrading\Responses;


class StockSearch extends IEXTradingResponse {

    public $symbol;
    public $securityName;
    public $securityType;
    public $region;
    public $exchange;

    /**
     * StockQuote constructor.
     *
     * @param $response
     */
    public function __construct( $response ) {
        $jsonString             = (string)$response->getBody();
        $a                      = \GuzzleHttp\json_decode( $jsonString, true );
        $this->symbol           = $a[ 'symbol' ];
        $this->securityName      = $a[ 'securityName' ];
        $this->securityType      = $a[ 'securityType' ];
        $this->region      = $a[ 'region' ];
        $this->exchange      = $a[ 'exchange' ];
    }

}
