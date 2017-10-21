
<script>
    var url_create_hive = "<?php echo base_url() . "hive/create_hive" ?>";
    var url_create_inspection= "<?php echo base_url() . "inspection/create_inspection" ?>";
    var url_source_apiary = "<?php echo base_url() . "apiary/get_source_apiary" ?>";
    var url_source_hive = "<?php echo base_url() . "hive/get_source_hive" ?>";
    var url_delete = "";
    var url_return = "<?php echo base_url() . "inspection/inspectionList" ?>";

    var validation_colony;
    var validation_hive;

    var data = [{id: 0, text: 'enhancement'}, {id: 1, text: 'bug'}, {id: 2, text: 'duplicate'}, {id: 3, text: 'invalid'}, {id: 4, text: 'wontfix'}];
    var myjson;
    var validation_inspection;

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


        $.getJSON(url_source_apiary, function (json) {
            $("#rucher").select2({
                data: json
            });
            loadRuches($("#rucher").val());
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
            $('#ruche').empty();
            $("#ruche").select2({
                placeholder: "",
                data: json
            });
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

