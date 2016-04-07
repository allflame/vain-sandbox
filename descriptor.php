<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/7/16
 * Time: 12:03 PM
 */
require __DIR__ . '/vendor/autoload.php';

$moduleFactory = new \Vain\Expression\Module\Factory\ModuleFactory();
$moduleRepository = new \Vain\Expression\Module\Repository\ModuleRepository($moduleFactory);
$comparatorFactory = new \Vain\Comparator\Factory\ComparatorFactory();
$comparatorRepository = new \Vain\Comparator\Repository\ComparatorRepository($comparatorFactory);
$evaluator = new Vain\Expression\Evaluator\Evaluator($comparatorRepository);
$descriptorFactory = new \Vain\Expression\Descriptor\Factory\DescriptorFactory($moduleRepository, $evaluator);
$descriptorBuilder = new \Vain\Expression\Descriptor\Builder\DescriptorBuilder($descriptorFactory);
$humanParser = new \Vain\Expression\Parser\Human\HumanParser();
$filterExpression = new \Vain\Expression\Comparison\Equal\EqualExpression(
    $descriptorBuilder
        ->local()
        ->property('type')
        ->getDescriptor(),
    $descriptorBuilder
        ->mode('int')
        ->inplace(1)
        ->getDescriptor()
);
$expression = new \Vain\Expression\Comparison\GreaterOrEqual\GreaterOrEqualExpression(
    $descriptorBuilder
        ->local()
        ->property('basket')
        ->property('transaction')
        ->property('items')
        ->filter($filterExpression)
        ->func('count')
        ->getDescriptor(),
    /**
    ->property('basket')
    ->property('transaction')
    ->property('items')
     ===
    ->property('basket.transaction.items')
    ->getDescriptor(),
     */
    $descriptorBuilder
        ->mode('int')
        ->inplace(3)
        ->getDescriptor()
);
$items = [];
$totalWeight = 0;
for ($i = 1; $i <= 5; $i++) {
    $weight = $i * 2;
    $items[] = new \Vain\Core\Runtime\RuntimeData(['id' => $i, 'type' => $i % 2, 'weight' => $weight]);
    $totalWeight += $weight;
}
$transaction = new Vain\Core\Runtime\RuntimeData(['id' => 100, 'items' => $items, 'weight' => $totalWeight]);
$basket = new \Vain\Core\Runtime\RuntimeData(['transaction' => $transaction]);
$runtimeData = new \Vain\Core\Runtime\RuntimeData(['basket' => $basket, 'api' => 'backoffice', 'php_version' => PHP_VERSION]);
var_dump($expression->parse($humanParser));
var_dump($expression->evaluate($evaluator, $runtimeData));