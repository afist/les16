
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css"  crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link href="css/popup-m1-style.css-v=4.css"  rel="stylesheet" type="text/css"/>



</head>
<body>
<body>

<div class="table" style="display: none"></div>
<button class="modal-district">добавить район</button>





<div id="overlay-popup-m1"></div>
<div id="m1-form" class="m1modal district-modal">
    <a class="close-m1"></a>
    <div>
        <div class="popup-m1-title">Добавить</div>
        <div class="popup-m1-cont"><div class="popup-m1-text1">Заполните все поля и нажмите добавить</div>
            <form  method="post" class="popup-m1-form">
                <input type="text" name="name"        placeholder="Имя района" required="">
                <input type="text" name="population"  placeholder="Население" required="">
                <textarea name="description" id="" placeholder="Описание" required="" cols="30" rows="10"></textarea>
                <input type="hidden" name="district" value="1">
                <button class="add-district">добавить</button>
            </form>
        </div></div></div>

<div id="overlay-popup-m1"></div>
<div id="m1-form" class="m1modal edit-modal">
    <a class="close-m1"></a>
    <div>
        <div class="popup-m1-title">Редактировать</div>
<!--        <div class="popup-m1-cont"><div class="popup-m1-text1">Заполните все поля и нажмите добавить</div>-->
            <form  method="post" class="popup-m1-form">
                <input type="text" name="name"        placeholder="Имя района" required="">
                <input type="text" name="population"  placeholder="Население" required="">
                <textarea name="description" id="" placeholder="Описание" required="" cols="30" rows="10"></textarea>
                <input type="hidden" name="district-edit" value="1">
                <input type="hidden" class="edit-id" name="id" value="">
                <button class="edit-district">сохранить</button>
            </form>
        </div></div></div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="js/popup-m1.js-v=4.js" tppabs="http://static.best-gooods.ru/js/popup-m1.js?v=4" type="text/javascript"></script>
<script src="js/main.js" type="text/javascript"></script>
</body>
</html>
