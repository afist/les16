<?php
namespace App\Store\StoreModels;

use App\Model\District;
use App\Model\ModelInterface;

class StoreHandlerDistrict implements StoreHandlerInterface
{
    /**
     * @var \PDO
     */
    private $pdo;

    /**
     * StoreHandlerDistrict constructor.
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param int $id
     * @return ModelInterface
     */
    public function findById(int $id): ModelInterface
    {
        $sdh = $this->pdo->prepare('SELECT * FROM districts d WHERE d.id =  :id');
        $sdh->bindParam(':id', $id);
        $sdh->execute();
        $sdh->setFetchMode(\PDO::FETCH_CLASS, \App\Model\District::class);
        $district = $sdh->fetch();

        return $district;
    }

    /**
     * @param ModelInterface|District $district
     */
    public function create(ModelInterface &$district): void
    {
        $sdh = $this->pdo->prepare('INSERT INTO districts (name, population, description) VALUES (:name, :population, :description)');
        $sdh->execute([
            'name' => $district->getName(),
            'population' => $district->getPopulation(),
            'description' => $district->getDescription(),
        ]);

        $lastId = $this->pdo->lastInsertId();

        $sdh = $this->pdo->prepare('SELECT * FROM districts d WHERE d.id = :id');
        $sdh->execute(['id' => $lastId]);
        $sdh->setFetchMode(\PDO::FETCH_CLASS, \App\Model\District::class);
        $district = $sdh->fetch();
    }

    public function update(ModelInterface $district)
    {
        $sdh = $this->pdo->prepare('UPDATE `districts` d SET `name` = :name, `population` = :population, `description` = :description  WHERE d.id = :id');
        $sdh->execute(['id' => $district->getId(),'name' => $district->getName(),'population' => $district->getPopulation(),'description' => $district->getDescription() ]);
    }

    public function delete(ModelInterface $district)
    {
        $sdh = $this->pdo->prepare('DELETE FROM `districts` d WHERE `districts`.`id` = :id');
        $sdh->execute([ 'id' => $district->getId() ]);
    }
    public function deleteById(int $id)
    {
        $sdh = $this->pdo->prepare('DELETE FROM `districts` WHERE `districts`.`id` = :id');
        $sdh->bindParam(':id', $id, \PDO::PARAM_INT);
        $sdh->execute();
    }

    public function colection($conditions)
    {

    }
    public function colectionAllDistrictToHtml()
    {

        $arr = $this->colectionAllDistrict();
        $text="<table class='new-table'><tr><th>id</th><th>Name</th><th>Population</th><th>Description</th><th>Редакт</th><th>Удалить</th></tr >";
        foreach ($arr as $value){
            $text.="<tr><td class=\"id\">{$value['id']}</td><td >{$value['name']}</td>
                    <td>{$value['population']}</td><td>{$value['description']}</td><td><button class='edit'>редакт</button></td><td><button class='delete'>удалить</button></td></tr>";
        }
        return $text."</table>";
    }
    private function colectionAllDistrict()
    {
        $sdh = $this->pdo->prepare("SELECT * FROM `districts`");
        $sdh->execute();
        $sdh->setFetchMode(\PDO::FETCH_ASSOC);
        return $sdh->fetchAll();
    }
}
