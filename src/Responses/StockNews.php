<?php

namespace DPRMC\IEXTrading\Responses;


class StockNews extends IEXTradingResponse {

    public $items;


    /**
     * StockNews constructor.
     *
     * @param $response \Psr\Http\Message\ResponseInterface
     */
    public function __construct( $response ) {
        $jsonString = (string)$response->getBody();
        $a          = \GuzzleHttp\json_decode( $jsonString, true );
        foreach ( $a as $newsItem ):
            if (isset($newsItem['news']))  {
                foreach ($newsItem['news'] as $new) {
                    $this->items[] = new StockNewsItem( $new );
                }
            } else {
                $this->items[] = new StockNewsItem( $newsItem );
            }
        endforeach;
    }

}
