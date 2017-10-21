
<script>
    var url_create_hive = "<?php echo base_url() . "hive/create_hive" ?>";
    var url_create_inspection= "<?php echo base_url() . "inspection/update_inspection" ?>";
    var url_source_apiary = "<?php echo base_url() . "apiary/get_source_apiary" ?>";
    var url_source_hive = "<?php echo base_url() . "hive/get_source_hive" ?>";
    var url_delete = "<?php echo base_url() . "inspection/delete_inspection/".$inspection->id_inspection ?>";
    var url_return = "<?php echo base_url() . "inspection/inspectionList" ?>";

    var validation_colony;
    var validation_hive;

    //var data = [{id: 0, text: 'enhancement'}, {id: 1, text: 'bug'}, {id: 2, text: 'duplicate'}, {id: 3, text: 'invalid'}, {id: 4, text: 'wontfix'}];
    var myjson;
    var validation_inspection;


    var vSelectApiary= "<?=$hive->id_apiary?>";
    var vSelectHive = "<?=$hive->id_beehive?>";

    $(function () {

        validation_inspection = $("#form-inspection").validate({
            ignore: [],
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
        
                $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });


        $.getJSON(url_source_apiary, function (json) {
          var $rucher =   $("#rucher").select2({
                data: json
            });
            loadRuches(vSelectApiary);
            $rucher.val(vSelectApiary).trigger("change"); 
                
           // $("#rucher").select2("val", vSelectApiary); //set the value
        });

        $('#datetimepicker4').datetimepicker({
            locale: 'fr',
            showClose: true
        });



    });

    var $eventSelect = $("#rucher");
    $eventSelect.on("select2:select", function (e) {
        loadRuches(e.params.data.id);
    });

    function loadRuches(id) {

        $.getJSON(url_source_hive + "/" + id, function (json) {
           var $ruche =  $('#ruche').empty();
            $("#ruche").select2({
                placeholder: "",
                data: json
            });
          $ruche.val(vSelectHive).trigger("change");
       
        });
    }
    ;

    function createInspection() {

        if (validation_inspection.form()) {
            document.getElementById("btn-save").disabled = true;
            $.ajax({
                type: "POST",
                url: url_create_inspection,
                dataType: 'json',
                data: $("#form-inspection").serialize(),
                success: function (result) {
                   
                    if (result.success) {
                        sweetAlert({
                            title: "Visite enregistrée !",
                            text: "Redirection en cours...",
                            timer: 5000,
                            showConfirmButton: false
                        });
                        document.location.href = url_return;
                    } else {
                        toastr["warning"]("Une erreur s'est produite lors de l'enregistrement");
                        document.getElementById("btn-save").disabled = false;
                    }
                }
            });
        } else {
              document.getElementById("btn-save").disabled = false;
            toastr["warning"]("Attention certain champs ne sont pas remplis correctement");
        }

    }

  function delete_inspection(){
        sweetAlert({
            title: "Êtes vous sur de vouloir supprimer cette visite?",
            text: "",
            type: "error",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
            confirmButtonText: "Oui",
            cancelButtonText: "Non"
        },
                function () {

                    $.ajax({
                        type: "GET",
                        url: url_delete,
                        dataType: 'json',
                        success: function (result) {
                            if (result.success) {
                                sweetAlert({
                                    title: "Elément supprimé !",
                                    text: "Redirection en cours...",
                                    timer: 5000,
                                    showConfirmButton: false
                                });
                                document.location.href = url_return;
                            }else{
                                sweetAlert({
                                    title: "Impossible de supprimer la visite",
                                    text: "" + result,
                                    timer: 6000,
                                    showConfirmButton: false
                                });
                            }
                        }
                    });


                });


    };
//
//
//$("#hive-form").submit(function(e)
//{
//	var postData = $(this).serializeArray();
//	var formURL = $(this).attr("action");
//	$.ajax(
//	{
//		url : formURL,
//		type: "POST",
//		data : postData,
//		success:function(data, textStatus, jqXHR) 
//		{
//                    if(data.success){
//                        alert("success")
//                    }else{
//                        alert("success")
//                    }
//                 ;
//		},
//		error: function(jqXHR, textStatus, errorThrown) 
//		{
//                    alert("error");
//		}
//	});
//    e.preventDefault();	//STOP default action
//});


//$("#hive-form").submit(); //SUBMIT FORM

</script>

