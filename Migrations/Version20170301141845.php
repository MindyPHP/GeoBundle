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
use Mindy\Bundle\GeoBundle\Model\District;
use Mindy\Bundle\GeoBundle\Model\Region;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170301141845 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $districtTable = $schema->createTable(District::tableName());
        $districtTable->addColumn('id', 'integer', ['unsigned' => true, 'autoincrement' => true]);
        $districtTable->addColumn('name', 'string', ['length' => 255]);
        $districtTable->addColumn('city_id', 'integer', ['length' => 11]);
        $districtTable->setPrimaryKey(['id']);

        $regionTable = $schema->getTable(Region::tableName());
        $regionTable->addColumn('country_id', 'integer', ['length' => 11]);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $schema->dropTable(District::tableName());

        $regionTable = $schema->getTable(Region::tableName());
        $regionTable->dropColumn('country_id');
    }
}
