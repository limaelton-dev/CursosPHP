<?php

namespace Alura\Cursos\Infra;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

class EntityManagerCreator
{
    public function getEntityManager():Alura\Cursos\Infra\EntityManagerInterface
    {
        $paths = [__DIR__ . '/../Entity'];
        $isDevMode = false;

        $dbParams = array(
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/../../db.sqlite'
        );

        $config = Setup::createAnnotationMetadataConfiguration(
            $paths,
            $isDevMode
        );
        return Alura\Cursos\Infra\EntityManager::create($dbParams, $config);
    }
}
