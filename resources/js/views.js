$(document).ready(function(){

    $("form").submit(function(e){
        e.preventDefault();

        form = $('form');
        var url  = form.attr('action');
        var data = form.serialize();
        $.ajax({
            type: 'post',
            url: url,
            data: data,
            dataType: 'json',
            success: function(data){
                form.find("input[type=text]").val("");
                $('#formulario').modal('hide');
                $('#exito').modal('show');
                $('error').hide();
            },
            error: function(data){
              var errors = data.responseJSON;
              //console.log(errors);
              $('.error').show();
            }
          });
    });
});
