<?php

declare(strict_types=1);

namespace App\Controller\Issuing;

use Slim\Http\Request;
use Slim\Http\Response;

final class UpdateCategories extends Base
{
    public function __invoke(Request $request, Response $response): Response
    {
        $input = (array) $request->getParsedBody();
        
        $updatedCategories =  $this->getUpdateCategoriesService()->updateCardCategories($input);

        return $this->jsonResponse($response, 'success', $updatedCategories, 200);
    }

}   