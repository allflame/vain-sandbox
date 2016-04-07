<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/5/16
 * Time: 12:14 PM
 */

require __DIR__ . '/vendor/autoload.php';

$comparatorFactory = new \Vain\Comparator\Factory\ComparatorFactory();
$comparatorRepository = new \Vain\Comparator\Repository\ComparatorRepository($comparatorFactory);
$humanParser = new \Vain\Expression\Parser\Human\HumanParser();
$basicModuleFactory = new \Vain\Expression\Module\Factory\ModuleFactory();
$moduleFactory = new \Vain\Sandbox\Data\Module\Factory\SandboxModuleFactory($basicModuleFactory);
$moduleRepository = new \Vain\Expression\Module\Repository\ModuleRepository($moduleFactory);
$evaluator = new Vain\Expression\Evaluator\Evaluator($comparatorRepository);
$descriptorFactory = new \Vain\Expression\Descriptor\Factory\DescriptorFactory($moduleRepository, $evaluator);

$expression = new \Vain\Expression\Comparison\Less\LessExpression(
    $descriptorFactory->module('system.time'),
    $descriptorFactory->mode($descriptorFactory->inplace(new DateTime('+1 day')), 'time')
);

var_dump($expression->parse($humanParser));



var_dump($expression->evaluate($evaluator));

$expression = new \Vain\Expression\Comparison\Less\LessExpression(
    $descriptorFactory->property($descriptorFactory->module('system.runtime'), 'version'),
    $descriptorFactory->mode($descriptorFactory->inplace(100), 'int')
);
$runtimeData = new \Vain\Core\Runtime\RuntimeData(['version' => 101]);
var_dump($expression->parse($humanParser));
var_dump($expression->evaluate($evaluator, $runtimeData));

$expression = new \Vain\Expression\Comparison\Less\LessExpression(
    $descriptorFactory->method($descriptorFactory->module('system.runtime'), 'count'),
    $descriptorFactory->mode($descriptorFactory->inplace(0), 'int')
);
var_dump($expression->parse($humanParser));
var_dump($expression->evaluate($evaluator, $runtimeData));