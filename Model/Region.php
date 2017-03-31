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
use Mindy\Orm\Fields\ForeignField;
use Mindy\Orm\Fields\SlugField;
use Mindy\Orm\Model;

/**
 * Class Region
 *
 * @property string $name_ru
 * @property string $name_en
 * @property string $iso
 * @property string $country_code
 * @property string $timezone
 * @property string $okato
 * @property Country $country
 * @property int $country_id
 */
class Region extends Model
{
    public static function getFields()
    {
        return [
            'iso' => [
                'class' => CharField::class,
                'length' => 7,
            ],
            'country_code' => [
                'class' => CharField::class,
                'length' => 2,
            ],
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
            'timezone' => [
                'class' => CharField::class,
                'length' => 30,
            ],
            'okato' => [
                'class' => CharField::class,
                'length' => 4,
            ],
            'country' => [
                'class' => ForeignField::class,
                'modelClass' => Country::class,
            ],
        ];
    }

    public function __toString()
    {
        return (string) $this->name_ru;
    }
}
