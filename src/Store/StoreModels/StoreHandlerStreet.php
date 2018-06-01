<?php
/**
 * User: Serhii T.
 * Date: 5/29/18
 */

namespace App\Store\StoreModels;

use App\Model\ModelInterface;
use App\Model\Street;

class StoreHandlerStreet implements StoreHandlerInterface
{
    /**
     * @var \PDO
     */
    private $pdo;

    /**
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param int $id
     * @return Street
     * @throws \Exception
     */
    public function findById(int $id): ModelInterface
    {
        $sdh = $this->pdo->prepare('SELECT * FROM streets s WHERE s.id =  :id');
        $sdh->bindParam(':id', $id);
        $sdh->execute();
        $sdh->setFetchMode(\PDO::FETCH_CLASS, Street::class);
        /** @var Street $street */
        $street = $sdh->fetch();

        $street->setDistrict($this->getDistrict($street->district_id));

        return $street;
    }

    /**
     * @param $districtId
     * @return \App\Model\District|Street
     * @throws \Exception
     */
    private function getDistrict($districtId)
    {
        $storeHandlerDistrict = \App\Store\FactoryStore::getStoreHandlerByClassModel(\App\Model\District::class);

        return $storeHandlerDistrict->findById($districtId);
    }

    public function create(ModelInterface &$model): void
    {
        // TODO: Implement create() method.
    }
}
