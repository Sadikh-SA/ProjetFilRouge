<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.XSR4Av2' shared service.

return $this->privates['.service_locator.XSR4Av2'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'App\\Controller\\CompteController::inserer' => ['privates', '.service_locator.ZIsCxOI', 'get_ServiceLocator_ZIsCxOIService.php', true],
    'App\\Controller\\PartenaireController::inserer' => ['privates', '.service_locator.ZIsCxOI', 'get_ServiceLocator_ZIsCxOIService.php', true],
    'App\\Controller\\SecuriteController::register' => ['privates', '.service_locator.JBoVXlr', 'get_ServiceLocator_JBoVXlrService.php', true],
    'App\\Controller\\CompteController:inserer' => ['privates', '.service_locator.ZIsCxOI', 'get_ServiceLocator_ZIsCxOIService.php', true],
    'App\\Controller\\PartenaireController:inserer' => ['privates', '.service_locator.ZIsCxOI', 'get_ServiceLocator_ZIsCxOIService.php', true],
    'App\\Controller\\SecuriteController:register' => ['privates', '.service_locator.JBoVXlr', 'get_ServiceLocator_JBoVXlrService.php', true],
], [
    'App\\Controller\\CompteController::inserer' => '?',
    'App\\Controller\\PartenaireController::inserer' => '?',
    'App\\Controller\\SecuriteController::register' => '?',
    'App\\Controller\\CompteController:inserer' => '?',
    'App\\Controller\\PartenaireController:inserer' => '?',
    'App\\Controller\\SecuriteController:register' => '?',
]);
