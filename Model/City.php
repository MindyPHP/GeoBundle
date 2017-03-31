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
use Mindy\Orm\Fields\ForeignField;
use Mindy\Orm\Fields\SlugField;
use Mindy\Orm\Model;

/**
 * Class City
 *
 * @property string $slug
 * @property string $name_ru
 * @property string $name_en
 * @property float $lat
 * @property float $lon
 * @property string $timezone
 * @property string $continent
 * @property string $okato
 * @property int $region_id
 * @property Region $region
 */
class City extends Model
{
    public static function getFields()
    {
        return [
            'name_ru' => [
                'class' => CharField::class,
                'length' => 128,
            ],
            'slug' => [
                'class' => SlugField::class,
                'source' => 'name_ru'
            ],
            'name_en' => [
                'class' => CharField::class,
                'length' => 128,
            ],
            'okato' => [
                'class' => CharField::class,
                'length' => 20,
            ],
            'lat' => [
                'class' => DecimalField::class,
                'precision' => 10,
                'scale' => 5,
            ],
            'lon' => [
                'class' => DecimalField::class,
                'precision' => 10,
                'scale' => 5,
            ],
            'region' => [
                'class' => ForeignField::class,
                'modelClass' => Region::class,
            ],
        ];
    }

    public function __toString()
    {
        return (string) $this->name_ru;
    }
}
