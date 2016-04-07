<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/5/16
 * Time: 11:08 AM
 */
require __DIR__ . '/vendor/autoload.php';

$moduleFactory = new \Vain\Expression\Module\Factory\ModuleFactory();
$moduleRepository = new \Vain\Expression\Module\Repository\ModuleRepository($moduleFactory);
$evaluator = new Vain\Expression\Evaluator\Evaluator($comparatorRepository);
$descriptorFactory = new \Vain\Expression\Descriptor\Factory\DescriptorFactory($moduleRepository, $evaluator);
$comparatorFactory = new \Vain\Comparator\Factory\ComparatorFactory();
$comparatorRepository = new \Vain\Comparator\Repository\ComparatorRepository($comparatorFactory);

$humanParser = new \Vain\Expression\Parser\Human\HumanParser();

$testExpression = new \Vain\Expression\Binary\AndX\AndExpression(
    new \Vain\Expression\Comparison\Less\LessExpression(
        $descriptorFactory->mode($descriptorFactory->inplace(2), 'int'),
        $descriptorFactory->mode($descriptorFactory->inplace(3), 'int')
    ),
    new \Vain\Expression\Comparison\Greater\GreaterExpression(
        $descriptorFactory->mode($descriptorFactory->inplace('b'), 'string'),
        $descriptorFactory->mode($descriptorFactory->inplace('a'), 'string')
    )
);

var_dump($testExpression->parse($humanParser));
var_dump($testExpression->evaluate($evaluator));
