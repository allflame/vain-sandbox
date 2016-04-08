<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/6/16
 * Time: 9:26 AM
 */
require __DIR__ . '/vendor/autoload.php';

$basicModuleFactory = new \Vain\Expression\Module\Factory\ModuleFactory();
$expressionFactory = new \Vain\Expression\Factory\ExpressionFactory();
$humanParser = new \Vain\Expression\Parser\Human\HumanParser();
$moduleFactory = new \Vain\Sandbox\Data\Module\Factory\SandboxModuleFactory($basicModuleFactory);
$moduleRepository = new \Vain\Expression\Module\Repository\ModuleRepository($moduleFactory);
$comparatorFactory = new \Vain\Comparator\Factory\ComparatorFactory();
$comparatorRepository = new \Vain\Comparator\Repository\ComparatorRepository($comparatorFactory);
$evaluator = new \Vain\Expression\Evaluator\Evaluator($comparatorRepository);
$descriptorFactory = new \Vain\Expression\Descriptor\Factory\DescriptorFactory($moduleRepository, $evaluator);
$serializer = new \Vain\Expression\Serializer\Serializer($expressionFactory, $descriptorFactory);


$expression = new \Vain\Expression\Comparison\Less\LessExpression(
    $descriptorFactory->module('system.time'),
    $descriptorFactory->mode($descriptorFactory->inplace(new DateTime('+1 day')), 'time')
);

printf('Before serialization:%s%s%s', PHP_EOL, $expression->parse($humanParser), PHP_EOL);
$serializedExpression = $serializer->serializeExpression($expression);
printf('Serialized presentation:%s%s%s', PHP_EOL, json_encode($serializedExpression), PHP_EOL);
$unserializedExpression = $serializer->unserializeExpression($serializedExpression);
$humanParser = new \Vain\Expression\Parser\Human\HumanParser();
printf('After unserialization:%s%s%s', PHP_EOL, $unserializedExpression->parse($humanParser), PHP_EOL);