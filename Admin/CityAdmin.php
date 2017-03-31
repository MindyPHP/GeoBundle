<?php

/*
 * (c) Studio107 <mail@studio107.ru> http://studio107.ru
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * Author: Maxim Falaleev <max@studio107.ru>
 */

namespace Mindy\Bundle\GeoBundle\Admin;

use Mindy\Bundle\AdminBundle\Admin\AbstractModelAdmin;
use Mindy\Bundle\GeoBundle\Form\CityForm;
use Mindy\Bundle\GeoBundle\Model\City;

class CityAdmin extends AbstractModelAdmin
{
    public function getFormType()
    {
        return CityForm::class;
    }

    public function getModelClass()
    {
        return City::class;
    }
}
