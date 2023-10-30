<?php

declare(strict_types=1);

use App\Controller\User;
use App\Controller\Issuing;
use App\Middleware\Auth;

/** @var \Slim\App $app */

$app->get('/', 'App\Controller\DefaultController:getHelp')->add(new Auth());
$app->get('/status', 'App\Controller\DefaultController:getStatus')->add(new Auth());
$app->post('/login', \App\Controller\User\Login::class);

$app->group('/api/v1', function () use ($app): void {

    $app->group('/issuing', function () use ($app): void {
        $app->post('/create_card', Issuing\CreateCard::class);
        $app->post('/add_funds', Issuing\AddFunds::class);
        $app->post('/show_transactions', Issuing\ShowTransactions::class);
        $app->post('/update_categories', Issuing\UpdateCategories::class);
    })->add(new Auth());

    $app->group('/users', function () use ($app): void {
        $app->get('', User\GetAll::class);
        $app->post('', User\Create::class);
        $app->get('/{id}', User\GetOne::class);
        $app->put('/{id}', User\Update::class);
        $app->delete('/{id}', User\Delete::class);
    })->add(new Auth());

});
