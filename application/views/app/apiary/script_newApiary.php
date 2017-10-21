<script>


    var url_return = "<?= base_url()."apiary/apiaryList" ?>";
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

    };
    
</script>