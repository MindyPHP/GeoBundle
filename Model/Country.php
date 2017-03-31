<?php

/*
 * (c) Studio107 <mail@studio107.ru> http://studio107.ru
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * Author: Maxim Falaleev <max@studio107.ru>
 */

namespace Mindy\Bundle\GeoBundle\Model;

use Mindy\Orm\Fields\CharField;
use Mindy\Orm\Fields\DecimalField;
use Mindy\Orm\Fields\SlugField;
use Mindy\Orm\Model;

/**
 * Class Country
 *
 * @property string $name_ru
 * @property string $iso
 * @property string $name_en
 * @property string $timezone
 * @property float $lat
 * @property float $lon
 */
class Country extends Model
{
    public static function getFields()
    {
        return [
            'iso' => [
                'class' => CharField::class,
                'length' => 2,
            ],
            'continent' => [
                'class' => CharField::class,
                'length' => 2,
            ],
            'name_ru' => [
                'class' => CharField::class,
                'length' => 128,
            ],
            'name_en' => [
                'class' => CharField::class,
                'length' => 128,
            ],
            'slug' => [
                'class' => SlugField::class,
                'source' => 'name_ru'
            ],
            'lat' => [
                'class' => DecimalField::class,
                'precision' => 6,
                'scale' => 2,
            ],
            'lon' => [
                'class' => DecimalField::class,
                'precision' => 6,
                'scale' => 2,
            ],
            'timezone' => [
                'class' => CharField::class,
                'length' => 30,
            ]
        ];
    }

    public function __toString()
    {
        return (string) $this->name_ru;
    }
}
