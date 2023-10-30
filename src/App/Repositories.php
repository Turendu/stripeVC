<?php

declare(strict_types=1);

use App\Repository\UserRepository;
use App\Repository\IssuingRepository;
use Psr\Container\ContainerInterface;

$container['user_repository'] = static fn (ContainerInterface $container): UserRepository => new UserRepository($container->get('db'));

$container['issuing_repository'] = static fn (ContainerInterface $container): IssuingRepository => new IssuingRepository($container->get('db'));
