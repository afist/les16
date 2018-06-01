<?php
/**
 * User: Serhii T.
 * Date: 5/29/18
 */

namespace App\Store\StoreModels;

use App\Model\ModelInterface;

interface StoreHandlerInterface
{
    public function findById(int $id): ModelInterface;

    public function create(ModelInterface &$model): void;
}
