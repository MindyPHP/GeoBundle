<?php

/*
 * (c) Studio107 <mail@studio107.ru> http://studio107.ru
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * Author: Maxim Falaleev <max@studio107.ru>
 */

namespace Mindy\Bundle\GeoBundle\Library;

use Mindy\Bundle\GeoBundle\GeoCoder\GeoCoderInterface;
use Mindy\Bundle\GeoBundle\GeoCoder\GeoNotFoundException;
use Mindy\Template\Library;

class GeoCoderLibrary extends Library
{
    /**
     * @var GeoCoderInterface
     */
    protected $geoCoder;

    /**
     * GeoCoderLibrary constructor.
     *
     * @param GeoCoderInterface $geoCoder
     */
    public function __construct(GeoCoderInterface $geoCoder)
    {
        $this->geoCoder = $geoCoder;
    }

    /**
     * @return array
     */
    public function getHelpers()
    {
        return [
            'geo_address' => function ($lat, $lng) {
                try {
                    return $this->geoCoder->getAddress($lat, $lng);
                } catch (GeoNotFoundException $e) {
                    return [];
                }
            },
            'geo_coordinates' => function ($address) {
                try {
                    return $this->geoCoder->getCoordinates($address);
                } catch (GeoNotFoundException $e) {
                    return [];
                }
            },
        ];
    }

    /**
     * @return array
     */
    public function getTags()
    {
        return [];
    }
}
