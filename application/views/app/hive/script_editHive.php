
<script>
    var url_update_hive = "<?php echo base_url()."hive/update_hive" ?>";
    var url_delete = "<?php echo base_url()."hive/delete_hive/".$hive->id_beehive ?>";
    var url_return =  "<?php echo base_url()."hive/hiveList" ?>";

    var validation_colony;
    var validation_hive;
 
    var vSelectApiary= "<?=$hive->id_apiary?>";


    $(function () {
         $("#id_beehive").select2();
        $("#id_beehive").select2("val", vSelectApiary);
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });

        //selections
        document.getElementById("etat").value = "<?=$hive->etat?>";
        document.getElementById("beehive_matiere").value = "<?=$hive->beehive_matiere?>";
        document.getElementById("id_beehive").value = "<?=$hive->id_beehive?>";
        document.getElementById("orientation").value = "<?=$hive->orientation?>";
        document.getElementById("exposition_soleil").value = "<?=$hive->exposition_soleil?>";
        
        document.getElementById("marquage").value = "<?=$colony->marquage?>";
        document.getElementById("agressivite").value = "<?=$colony->agressivite?>";
        document.getElementById("activite").value = "<?=$colony->activite?>";
        
        
       validation_hive = $("#formHive").validate({
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
 
        
        

     validation_colony =   $("#formColony").validate({
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

    });



function saveHive(){
    
    if(validation_colony.form() && validation_hive.form() ){
        
        
         $.ajax({
                type: "POST",
                url: url_update_hive,
                dataType: 'json',
                data: $("#formHive, #formColony").serialize(),
                success: function (result) {
                   
                    if (result.success) {
                        sweetAlert({
                            title: "Ruche enregistrée !",
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
        
};


  function delete_apiary() {
        sweetAlert({
            title: "Êtes vous sur de vouloir supprimer cette ruche ?",
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
                                    title: "Ruche effacé !",
                                    text: "Redirection en cours...",
                                    timer: 5000,
                                    showConfirmButton: false
                                });
                                document.location.href = url_return;
                            }else{
                                sweetAlert({
                                    title: "Impossible de supprimer la ruche",
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

