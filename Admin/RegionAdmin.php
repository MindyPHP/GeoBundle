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
use Mindy\Bundle\GeoBundle\Form\RegionForm;
use Mindy\Bundle\GeoBundle\Model\Region;

class RegionAdmin extends AbstractModelAdmin
{
    public function getFormType()
    {
        return RegionForm::class;
    }

    public function getModelClass()
    {
        return Region::class;
    }
}
