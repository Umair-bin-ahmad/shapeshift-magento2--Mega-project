<?php
/**
 * @copyright: Copyright © 2017 Firebear Studio. All rights reserved.
 * @author   : Firebear Studio <fbeardev@gmail.com>
 */

namespace Firebear\ShapeShift\Model\CurrencyConverter;

use Firebear\ShapeShift\Model\CurrencyConverter\Request;

class CoinMarketCap
{

    const API_URL = "https://api.coinmarketcap.com/v1/";

    /**
     * Returns Ticker data.
     *
     * @param int    $limit   only returns the top limit results.
     * @param string $convert return price, 24h volume, and market cap in terms
     *                        of another currency.
     *                        Valid values are:
     *                        "AUD", "BRL", "CAD", "CHF", "CNY", "EUR", "GBP", "HKD", "IDR",
     *                        "INR", "JPY", "KRW", "MXN", "RUB"
     *
     * @return array
     */
    public static function getTicker($limit = 10, $convert = "USD")
    {
        return Request::exec(
            self::API_URL . "ticker/",
            [
                'limit'   => $limit,
                'convert' => $convert
            ]
        );
    }

    /**
     * Returns specified currency Ticker data.
     *
     * @param string $currency Currency name.
     * @param string $convert  return price, 24h volume, and market cap in terms
     *                         of another currency.
     *                         Valid values are:
     *                         "AUD", "BRL", "CAD", "CHF", "CNY", "EUR", "GBP", "HKD", "IDR",
     *                         "INR", "JPY", "KRW", "MXN", "RUB"
     *
     * @return array
     */
    public static function getCurrencyTicker($currency = "bitcoin", $convert = "USD")
    {
        if ($currency == 'ether') {
            $currency = 'ethereum';
        }

        return Request::exec(
            self::API_URL . "ticker/{$currency}/",
            [
                'convert' => $convert
            ]
        );
    }

    /**
     * Returns global data.
     *
     * @param string $convert return price, 24h volume, and market cap in terms
     *                        of another currency.
     *                        Valid values are:
     *                        "AUD", "BRL", "CAD", "CHF", "CNY", "EUR", "GBP", "HKD", "IDR",
     *                        "INR", "JPY", "KRW", "MXN", "RUB"
     *
     * @return array
     */
    public static function getGlobalData($convert = "USD")
    {
        return Request::exec(
            self::API_URL . "global/",
            [
                'convert' => $convert
            ]
        );
    }

}
