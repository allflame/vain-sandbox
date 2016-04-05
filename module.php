<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/5/16
 * Time: 12:14 PM
 */

require __DIR__ . '/vendor/autoload.php';

$expression = new \Vain\Expression\Comparison\Less\LessExpression(
    new \Vain\Data\Descriptor\Module\Direct\DirectModuleDescriptor(new \Vain\Sandbox\Data\Module\TimeDataModule(), 'time'),
    new \Vain\Data\Descriptor\InPlace\InPlaceDescriptor(new DateTime('+1 day'), 'time')
);

$humanParser = new \Vain\Expression\Parser\Human\HumanExpressionParser();

var_dump($expression->parse($humanParser));

$comparators = ['int' => null, 'string' => null, 'time' => null];
$comparatorFactory = new \Vain\Comparator\Factory\ComparatorFactory();
$comparatorRepository = new \Vain\Comparator\Repository\ComparatorRepository($comparatorFactory, $comparators);

$evaluator = new Vain\Expression\Evaluator\ExpressionEvaluator($comparatorRepository);
var_dump($expression->evaluate($evaluator));
