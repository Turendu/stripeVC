<?php

declare(strict_types=1);

namespace data\doctrine\migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220117111907 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("CREATE TABLE `cards` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `card_holder` varchar(50) NOT NULL,
            `ch_name` varchar(100) NOT NULL,
            `ch_email` varchar(50) NOT NULL,
            `ch_phone_number` varchar(50) NOT NULL,
            `ch_address` varchar(250) NOT NULL,
            `ch_city` varchar(100) NOT NULL,
            `ch_state` varchar(50) NOT NULL,
            `ch_postal_code` varchar(10) NOT NULL,
            `ch_country` varchar(2) NOT NULL,
            `card_id` varchar(50) NOT NULL 'empty',
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
");
    }

    public function down(Schema $schema): void
    {

    }
}
