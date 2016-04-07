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
$descriptorFactory = new \Vain\Expression\Descriptor\Factory\DescriptorFactory($moduleRepository);
$comparatorFactory = new \Vain\Comparator\Factory\ComparatorFactory();
$comparatorRepository = new \Vain\Comparator\Repository\ComparatorRepository($comparatorFactory);
$evaluator = new Vain\Expression\Evaluator\ExpressionEvaluator($comparatorRepository);
$humanParser = new \Vain\Expression\Parser\Human\HumanExpressionParser();

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
