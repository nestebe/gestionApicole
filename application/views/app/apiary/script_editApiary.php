<script>

    var url_delete = "<?= base_url() . "apiary/delete_apiary/$apiary->id_rucher" ?>";
    var url_return = "<?= base_url() . "apiary/apiaryList" ?>";
    $("#form-rucher").validate({
        highlight: function (element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorPlacement: function (error, element) {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });





    function req_save() {

        $("#form-rucher").submit();

    }
    ;


    function delete_apiary() {
        sweetAlert({
            title: "Êtes vous sur de vouloir supprimer ce rucher ?",
            text: "Les ruches et colonies liées au rucher seront également supprimé",
            type: "error",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
            confirmButtonText: "Oui",
            cancelButtonText: "Non",
        },
                function () {


                    $.ajax({
                        type: "GET",
                        url: url_delete,
                        dataType: 'json',
                        success: function (result) {
                            if (result.success) {
                                sweetAlert({
                                    title: "Rucher effacé !",
                                    text: "Redirection en cours...",
                                    timer: 5000,
                                    showConfirmButton: false
                                });
                                document.location.href = url_return;
                            }else{
                                sweetAlert({
                                    title: "Impossible de supprimer le rucher",
                                    text: "Redirection en cours...",
                                    timer: 5000,
                                    showConfirmButton: false
                                });
                            }
                        }
                    });


                });


    }
    ;

</script>


<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

