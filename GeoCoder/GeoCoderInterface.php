<?php

/*
 * (c) Studio107 <mail@studio107.ru> http://studio107.ru
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * Author: Maxim Falaleev <max@studio107.ru>
 */

namespace Mindy\Bundle\GeoBundle\GeoCoder;

interface GeoCoderInterface
{
    /**
     * @param float $lat
     * @param float $lng
     *
     * @throws GeoNotFoundException
     *
     * @return GeoResult[]
     */
    public function getAddress($lat, $lng);

    /**
     * @param string $address
     *
     * @throws GeoNotFoundException
     *
     * @return GeoResult[]
     */
    public function getCoordinates($address);
}
