<?php

use Di\ContainerBuilder;
use League\Plates\Engine;
use Psr\Container\ContainerInterface;
use function DI\create;

$dbPath = '/../banco.sqlite';
$builder = new ContainerBuilder();
$builder->addDefinitions([
    PDO::class => create(PDO::class)    ->constructor("sqlite:$dbPath"),
    Engine::class => function () {
        $templatePath = __DIR__ . '/../views';
        return new Engine($templatePath);
    }
]);

/** @var ContainerInterface $container */
$container = $builder->build();

return $container;