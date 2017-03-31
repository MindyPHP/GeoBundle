<?php

/*
 * (c) Studio107 <mail@studio107.ru> http://studio107.ru
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * Author: Maxim Falaleev <max@studio107.ru>
 */

namespace Mindy\Bundle\GeoBundle\GeoCoder;

class GeoResult
{
    /**
     * @var string
     */
    protected $address;
    /**
     * @var float
     */
    protected $lat;
    /**
     * @var float
     */
    protected $lng;

    /**
     * @param string $address
     *
     * @return GeoResult
     */
    public function setAddress(string $address): GeoResult
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @param float $lng
     *
     * @return GeoResult
     */
    public function setLng(float $lng): GeoResult
    {
        $this->lng = $lng;

        return $this;
    }

    /**
     * @param float $lat
     *
     * @return GeoResult
     */
    public function setLat(float $lat): GeoResult
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return float
     */
    public function getLng(): float
    {
        return $this->lng;
    }

    /**
     * @return float
     */
    public function getLat(): float
    {
        return $this->lat;
    }
}
