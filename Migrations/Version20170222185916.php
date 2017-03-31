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
use Mindy\Bundle\GeoBundle\Model\Country;
use Mindy\Bundle\GeoBundle\Model\Region;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170222185916 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $countryTable = $schema->createTable(Country::tableName());
        $countryTable->addColumn('id', 'integer', ['unsigned' => true, 'autoincrement' => true]);
        $countryTable->addColumn('iso', 'string', ['length' => 2]);
        $countryTable->addColumn('continent', 'string', ['length' => 2]);
        $countryTable->addColumn('name_ru', 'string', ['length' => 128]);
        $countryTable->addColumn('name_en', 'string', ['length' => 128]);
        $countryTable->addColumn('timezone', 'string', ['length' => 30]);
        $countryTable->addColumn('lat', 'decimal', ['precision' => 6, 'scale' => 2]);
        $countryTable->addColumn('lon', 'decimal', ['precision' => 6, 'scale' => 2]);
        $countryTable->setPrimaryKey(['id']);

        $regionTable = $schema->createTable(Region::tableName());
        $regionTable->addColumn('id', 'integer', ['unsigned' => true, 'autoincrement' => true]);
        $regionTable->addColumn('iso', 'string', ['length' => 7]);
        $regionTable->addColumn('name_ru', 'string', ['length' => 128]);
        $regionTable->addColumn('name_en', 'string', ['length' => 128]);
        $regionTable->addColumn('okato', 'string', ['length' => 4]);
        $regionTable->addColumn('country_code', 'string', ['length' => 2]);
        $regionTable->setPrimaryKey(['id']);

        $cityTable = $schema->createTable(City::tableName());
        $cityTable->addColumn('id', 'integer', ['unsigned' => true, 'autoincrement' => true]);
        $cityTable->addColumn('name_ru', 'string', ['length' => 128]);
        $cityTable->addColumn('name_en', 'string', ['length' => 128]);
        $cityTable->addColumn('okato', 'string', ['length' => 20]);
        $cityTable->addColumn('lat', 'decimal', ['precision' => 10, 'scale' => 5]);
        $cityTable->addColumn('lon', 'decimal', ['precision' => 10, 'scale' => 5]);
        $cityTable->addColumn('region_id', 'integer', ['length' => 11]);
        $cityTable->setPrimaryKey(['id']);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $schema->dropTable(Country::tableName());
        $schema->dropTable(Region::tableName());
        $schema->dropTable(City::tableName());
    }
}
