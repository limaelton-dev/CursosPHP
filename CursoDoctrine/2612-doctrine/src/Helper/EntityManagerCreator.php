<?php

namespace Alura\Doctrine\Helper;

use Doctrine\ORM\{EntityManager, ORMSetup};


class EntityManagerCreator
{
    public static function createEntityManager(): EntityManager
    {
        $config = ORMSetup::createAttributeMetadataConfiguration(
            paths: [__DIR__."/.."],
            isDevMode: true,
        );

        $conn = [
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/../../db.sqlite',
        ];

        // obtaining the entity manager
        return EntityManager::create($conn, $config);
    }
}