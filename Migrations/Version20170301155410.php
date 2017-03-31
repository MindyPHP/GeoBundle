<?php

/*
 * (c) Studio107 <mail@studio107.ru> http://studio107.ru
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * Author: Maxim Falaleev <max@studio107.ru>
 */

namespace Mindy\Bundle\GeoBundle\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Mindy\Bundle\GeoBundle\Model\City;
use Mindy\Bundle\GeoBundle\Model\District;
use Mindy\Bundle\GeoBundle\Model\Region;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170301155410 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $regionTable = $schema->getTable(Region::tableName());
        $regionTable->addColumn('slug', 'string', ['length' => 128]);

        $cityTable = $schema->getTable(City::tableName());
        $cityTable->addColumn('slug', 'string', ['length' => 128]);

        $districtTable = $schema->getTable(District::tableName());
        $districtTable->addColumn('slug', 'string', ['length' => 128]);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $regionTable = $schema->getTable(Region::tableName());
        $regionTable->dropColumn('slug');

        $cityTable = $schema->getTable(City::tableName());
        $cityTable->dropColumn('slug');

        $districtTable = $schema->getTable(District::tableName());
        $districtTable->dropColumn('slug');
    }
}
