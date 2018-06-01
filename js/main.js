$.ajax({
        url: "main.php",
        type: "post",
        data: {"start": "go"},
        success(a){
            $(a).insertAfter( $(".table") );
        }
    });

setTimeout(function(){

$('.modal-district').click(function() {

        var modalWindow = $(".district-modal");
        M1.modalShow(modalWindow);
        $("#overlay-popup-m1").show();
        return false;
    })
    $(window).click(function(e) {
        var target = $(event.target);
        if (target.is("#overlay-popup-m1")) {
            $("#overlay-popup-m1").hide();
            $(".district-modal").hide();

        }
    });

    $(window).click(function(e) {
        var target = $(event.target);
        if (target.is("#overlay-popup-m1")) {
            $("#overlay-popup-m1").hide();
            $(".edit-modal").hide();

        }
    });


$('.add-district').click(function(event){
    var serializedData = $(this).parent().serialize();
    request = $.ajax({
        url: "main.php",
        type: "post",
        data: serializedData,
        success(a){
        }
    });

})
$('.edit-district').click(function(event){
    var serializedData = $(this).parent().serialize();
    request = $.ajax({
        url: "main.php",
        type: "post",
        data: serializedData,
        success(a){
        }
    });

})
        $('.edit').click(function () {
            var id = $(this).parent().parent().find('td.id').html();
            var modalWindow = $(".edit-modal");
            M1.modalShow(modalWindow);
            $("#overlay-popup-m1").show();
            $('.edit-id').val(id);
            request = $.ajax({
                url: "main.php",
                type: "post",
                data: {'edit':'ok', 'id':id},
                success(a){
                    var arr = a.split(';');
                    $(".edit-modal [name='name']").val(arr[0]);
                    $(".edit-modal [name='population']").val(arr[1]);
                    $(".edit-modal [name='description']").val(arr[2]);
                }
            });
            return false;
    })



    $('.delete').click(function () {
        var id = $(this).parent().parent().find('td.id').html();
        request = $.ajax({
            url: "main.php",
            type: "post",
            data: {'delete':'ok', 'id':id},
            success(a){
                location.reload();
            }
        });
    })


}, 500);

