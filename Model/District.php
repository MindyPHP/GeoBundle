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
 * Class District
 *
 * @property string $name
 * @property int $city_id
 * @property City $city
 */
class District extends Model
{
    public static function getFields()
    {
        return [
            'name' => [
                'class' => CharField::class,
            ],
            'slug' => [
                'class' => SlugField::class,
            ],
            'city' => [
                'class' => ForeignField::class,
                'modelClass' => City::class,
            ],
        ];
    }

    public function __toString()
    {
        return (string) $this->name;
    }
}
