<?php

/*
 * (c) Studio107 <mail@studio107.ru> http://studio107.ru
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * Author: Maxim Falaleev <max@studio107.ru>
 */

namespace Mindy\Bundle\GeoBundle\GeoCoder\Chain;

use Mindy\Bundle\GeoBundle\GeoCoder\GeoCoderInterface;
use Mindy\Bundle\GeoBundle\GeoCoder\GeoNotFoundException;

/**
 * Class ChainGeoCoder
 */
class ChainGeoCoder implements GeoCoderInterface
{
    /**
     * @var GeoCoderInterface[]
     */
    protected $geoCoders = [];

    /**
     * @param GeoCoderInterface $geoCoder
     */
    public function addGeoCoder(GeoCoderInterface $geoCoder)
    {
        $this->geoCoders[] = $geoCoder;
    }

    /**
     * {@inheritdoc}
     */
    public function getAddress($lat, $lng)
    {
        foreach ($this->geoCoders as $geoCoder) {
            try {
                return $geoCoder->getAddress($lat, $lng);
            } catch (GeoNotFoundException $e) {
                continue;
            }
        }

        throw new GeoNotFoundException();
    }

    /**
     * {@inheritdoc}
     */
    public function getCoordinates($address)
    {
        foreach ($this->geoCoders as $geoCoder) {
            try {
                return $geoCoder->getCoordinates($address);
            } catch (GeoNotFoundException $e) {
                continue;
            }
        }

        throw new GeoNotFoundException();
    }
}
