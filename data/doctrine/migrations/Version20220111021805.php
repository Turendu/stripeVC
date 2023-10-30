<?php

declare(strict_types=1);

namespace data\doctrine\migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220111021805 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("CREATE TABLE `users` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
                        `name` varchar(100) NOT NULL,
                        `email` varchar(50) NOT NULL UNIQUE,
                        `password` varchar(128),
                        PRIMARY KEY (`id`)
                    ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        ");
        $this->addSql("INSERT INTO `users` (`name`, `email`, `password`)
                        VALUES('Mariano Sanchez', 'msanhez@nectica.com.ar', 'ee26b0dd4af7e749aa1a8ee3c10ae9923f618980772e473f8819a5d4940e0db27ac185f8a0e1d5f84f88bc887fd67b143732c304cc5fa9ad8e6f57f50028a8ff')
        ");
    }

    public function down(Schema $schema): void
    {

    }
}
