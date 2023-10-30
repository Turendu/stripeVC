<?php

declare(strict_types=1);

use App\Service\User;
use App\Service\Issuing;
use Psr\Container\ContainerInterface;

$container['find_user_service'] = static fn (ContainerInterface $container): User\Find => new User\Find(
    $container->get('user_repository'),
    $container->get('redis_service')
);

$container['create_user_service'] = static fn (ContainerInterface $container): User\Create => new User\Create(
    $container->get('user_repository'),
    $container->get('redis_service')
);

$container['update_user_service'] = static fn (ContainerInterface $container): User\Update => new User\Update(
    $container->get('user_repository'),
    $container->get('redis_service')
);

$container['delete_user_service'] = static fn (ContainerInterface $container): User\Delete => new User\Delete(
    $container->get('user_repository'),
    $container->get('redis_service')
);

$container['login_user_service'] = static fn (ContainerInterface $container): User\Login => new User\Login(
    $container->get('user_repository'),
    $container->get('redis_service')
);

$container['create_card_service'] = static fn (ContainerInterface $container): Issuing\CreateCard => new Issuing\CreateCard(
    $container->get('issuing_repository'),
    $container->get('redis_service')
);

$container['add_funds_service'] = static fn (ContainerInterface $container): Issuing\AddFunds => new Issuing\AddFunds(
    $container->get('issuing_repository'),
    $container->get('redis_service')
);

$container['show_transactions_service'] = static fn (ContainerInterface $container): Issuing\ShowTransactions => new Issuing\ShowTransactions(
    $container->get('issuing_repository'),
    $container->get('redis_service')
);

$container['update_categories_service'] = static fn (ContainerInterface $container): Issuing\UpdateCategories => new Issuing\UpdateCategories(
    $container->get('issuing_repository'),
    $container->get('redis_service')
);