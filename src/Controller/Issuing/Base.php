<?php

declare(strict_types=1);

namespace App\Controller\Issuing;

use App\Controller\BaseController;
use App\Exception\Issuing;
use App\Service\Issuing\CreateCard;
use App\Service\Issuing\AddFunds;
use App\Service\Issuing\ShowTransactions;
use App\Service\Issuing\UpdateCategories;

abstract class Base extends BaseController
{
    protected function getCreateCardService(): CreateCard
    {
        return $this->container->get('create_card_service');
    }

    protected function getAddFundsService(): AddFunds
    {
        return $this->container->get('add_funds_service');
    }

    protected function getShowTransactionsService(): ShowTransactions
    {
        return $this->container->get('show_transactions_service');
    }

    protected function getUpdateCategoriesService(): UpdateCategories
    {
        return $this->container->get('update_categories_service');
    }

}