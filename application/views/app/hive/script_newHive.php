
<script>
    var url_create_hive = "<?php echo base_url() . "hive/create_hive" ?>";
    var url_create_colony = "<?php echo base_url() . "hive/create_hive" ?>";
    var url_delete = "";
    var url_return = "<?= base_url() . "hive/hiveList" ?>";

    var validation_colony;
    var validation_hive;



    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });




        validation_hive = $("#formHive").validate({
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




        validation_colony = $("#formColony").validate({
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

    });



    function saveHive() {

        if (validation_colony.form() && validation_hive.form()) {
            document.getElementById("btn-save").disabled = true;
            $.ajax({
                type: "POST",
                url: url_create_colony,
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
                        document.getElementById("btn-save").disabled = false;
                    }
                }
            });
        } else {
              document.getElementById("btn-save").disabled = false;
            toastr["warning"]("Attention certain champs ne sont pas remplis correctement");
        }

    }
    


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

