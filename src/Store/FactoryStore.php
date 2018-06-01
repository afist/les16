<?php
namespace App\Store;

use App\Model\District;
use App\Model\Street;
use App\Store\StoreModels\StoreHandlerDistrict;
use App\Store\StoreModels\StoreHandlerInterface;
use App\Store\StoreModels\StoreHandlerStreet;

/**
 * User: Serhii T.
 * Date: 5/29/18
 */

class FactoryStore
{
    /**
     * @var \PDO
     */
    private $dbh;

    /**
     * @var FactoryStore
     */
    private static $instance;

    /**
     * @var \ArrayObject
     */
    private static $collection;

    /**
     * FactoryStore constructor.
     * @param \PDO $dbh
     */
    private function __construct(\PDO $dbh)
    {
        $this->dbh = $dbh;
        self::$collection = new \ArrayObject();
    }

    /**
     * @param \PDO $dbh
     */
    public static function init(\PDO $dbh)
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self($dbh);
        }
    }

    /**
     * @param $classModel
     * @return StoreHandlerInterface
     * @throws \Exception
     */
    public static function getStoreHandlerByClassModel($classModel)
    {
        if (!self::$instance instanceof self) {
            throw new \Exception('Need call FactoryStore::init().');
        }

        if (!self::$collection->offsetExists($classModel)) {
           self::$collection->offsetSet($classModel, self::$instance->createStore($classModel));
        }

        return self::$collection->offsetGet($classModel);
    }

    /**
     * @param $classModel
     * @return StoreHandlerInterface
     * @throws \Exception
     */
    public function createStore($classModel)
    {
        switch (true) {
            case $classModel === Street::class : {
                return new StoreHandlerStreet($this->dbh);
            }
            case $classModel === District::class : {
                return new StoreHandlerDistrict($this->dbh);
            }
            default: throw new \Exception(sprintf('Not found StoreHandler by %s.', $classModel));
        }
    }
}
