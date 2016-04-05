<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/5/16
 * Time: 11:08 AM
 */
require __DIR__ . '/vendor/autoload.php';

$testExpression = new \Vain\Expression\Binary\AndX\AndExpression(
    new \Vain\Expression\Comparison\Less\LessExpression(
        new \Vain\Data\Descriptor\InPlace\InPlaceDescriptor(3, 'int'),
        new \Vain\Data\Descriptor\InPlace\InPlaceDescriptor(2, 'int')
    ),
    new \Vain\Expression\Comparison\Greater\GreaterExpression(
        new \Vain\Data\Descriptor\InPlace\InPlaceDescriptor('b', 'string'),
        new \Vain\Data\Descriptor\InPlace\InPlaceDescriptor('a', 'string')
    )
);

$humanParser = new \Vain\Expression\Parser\Human\HumanExpressionParser();

var_dump($testExpression->parse($humanParser));

$comparatorFactory = new \Vain\Comparator\Factory\ComparatorFactory();
$comparators = ['int' => null, 'string' => null, 'time' => null];
$comparatorRepository = new \Vain\Comparator\Repository\ComparatorRepository($comparatorFactory, $comparators);
$evaluator = new Vain\Expression\Evaluator\ExpressionEvaluator($comparatorRepository);

var_dump($testExpression->evaluate($evaluator));
