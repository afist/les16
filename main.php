<?php
require_once 'autoload.php';

$host = '127.0.0.1:3305';
$dbName = 'test_db';
$user = 'root';
$pass = '';

try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $user, $pass);

    \App\Store\FactoryStore::init($dbh);

//    $storeHandlerStreet = \App\Store\FactoryStore::getStoreHandlerByClassModel(\App\Model\Street::class);
//
//
//    $street = $storeHandlerStreet->findById(1);




    $storeHandlerDistrict = \App\Store\FactoryStore::getStoreHandlerByClassModel(\App\Model\District::class);
    if ($_POST['start'] ==='go'){
        $district = $storeHandlerDistrict->colectionAllDistrictToHtml();
        echo $district;
    }

    if (!empty($_POST['district']) and !empty($_POST['name']) and !empty($_POST['population']) and !empty($_POST['description'])) {
        $newDistrict = new \App\Model\District;
        $newDistrict->setName($_POST['name']);
        $newDistrict->setPopulation($_POST['population']);
        $newDistrict->setDescription($_POST['description']);
        $storeHandlerDistrict->create($newDistrict);
    }
    if (($_POST['delete'] ==='ok') and (( !empty($_POST['id']) or ($_POST['id']==='0')))  ){
         $storeHandlerDistrict->deleteById($_POST['id']);

    }
    if (($_POST['edit'] ==='ok') and (( !empty($_POST['id']) or ($_POST['id']==='0')))  ){
        $editDistrict = $storeHandlerDistrict->findById($_POST['id']);
        echo $editDistrict->getName().";".$editDistrict->getPopulation().";".$editDistrict->getDescription();

    }

    if ( ($_POST['district-edit']==='1') and (!empty($_POST['id'])) ){
        $editDistrict = $storeHandlerDistrict->findById($_POST['id']);
        $editDistrict->setName($_POST['name']);
        $editDistrict->setPopulation($_POST['population']);
        $editDistrict->setDescription($_POST['description']);
        $storeHandlerDistrict->update($editDistrict);
    }



//    $district->setName('13 РАЙОН');

    //$storeHandlerDistrict->update($district);

    //@TODO Созданее нового
/*    $district = new \App\Model\District();
    $district->setName('Новый Район1');
    $district->setPopulation(123000);


    $storeHandlerDistrict->create($district);*/

// echo "<pre>";
//    var_dump($district);
//    echo "</pre>";

    //@TODO Выборка
/*    $population = '300000';
    $sdh = $dbh->prepare('SELECT * FROM districts d WHERE d.population > :population');
    $sdh->bindParam(':population', $population);
    $sdh->execute();

    foreach ($sdh->fetchAll(PDO::FETCH_CLASS, \App\Model\District::class) as $row) {
        var_dump($row);
    }*/

} catch (PDOException $exception) {
    echo $exception->getMessage();
} catch (Exception $e) {
}


