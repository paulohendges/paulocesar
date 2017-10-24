(function ($) {
    $(function () {
        // mask
        $('#telefone').inputmask('(99) 9 9999-9999');
        
        // scrollspy
        $('.scrollspy').scrollSpy({scrollOffset: 80});
        var options = [{
                selector: '#img1', offset: 300, callback: function (el) {
                    Materialize.fadeInImage($(el));
                }},
            {selector: '#img2', offset: 300, callback: function (el) {
                    Materialize.fadeInImage($(el));
                }},
            {selector: '#img3', offset: 300, callback: function (el) {
                    Materialize.fadeInImage($(el));
                }},
            {selector: '#img4', offset: 300, callback: function (el) {
                    Materialize.fadeInImage($(el));
                }},
            {selector: '#contato-container', offset: 300, callback: function (el) {
                    Materialize.fadeInImage($(el));
                }}
        ];

        Materialize.scrollFire(options);

        // menu
        $('a.nav-links').click(function () {
            $(this).closest('ul').find('li').removeClass('active');
            $(this).parent().addClass('active');
        })
        
        // nav parallax
        $('.button-collapse').sideNav({'closeOnClick': true});
        $('.parallax').parallax();
        
        // validation form
        $.validator.addMethod("telefoneCel", function(value) {
            valor = value.replace(/[^0-9]/ig,'').length;
            return valor < 11 ? false : true;
        }, "Digite um Telefone válido");
        
        $("form[name='formContato']").validate({
            rules: {
                nome: {
                    required: true,
                    minlength: 4,
                },
                email: {
                    required: true,
                    email: true
                },
                telefone: {
                    required: true,
                    telefoneCel: true,
                    maxlength: 16
                },
                textoContato: {
                    required: true,
                    minlength: 20,
                    maxlength: 350
                }
            },
            messages: {
                nome: {
                    required: "Campo Obrigatório",
                    minlength: "Mínimo Requerido de 4 Caracteres"
                },
                email: {
                    required: "Campo Obrigatório",
                    email: "Informe um E-mail Válido"
                },
                telefone: {
                    required: "Campo Obrigatório",
                    maxlength: "Digite um telefone válido"
                },
                textoContato: {
                    required: "Informe uma Mensagem",
                    minlength: "Mínimo Requerido de 20 Caracteres",
                    maxlength: "Máximo de 350 Caracteres Atingido"
                }
            },
            errorClass: 'invalid',
            errorPlacement: function (error, element) {
                element.next("label").attr("data-error", error.contents().text());
            },
            highlight: function (element) {
                $(element).addClass('validate invalid');
            },
            unhighlight: function (element) {
                $(element).removeClass('validate invalid');
                $(element).closest('div.input-field').find('label').removeClass("red-text").removeAttr('data-error');
                $(element).closest('div.input-field').find('i').removeClass("red-text");

            },
            submitHandler: function (form) {
                $('button[name="btnContato"]').html('Aguarde...');
                $('button[name="btnContato"]').addClass('disabled');
                
                var chk = 0;
                if ($('input[name="whats"]').is(':checked')) {
                    chk = $('input[name="whats"]').val();
                } 
                
                $.ajax({
                    url: '',
                    type: 'POST',
                    data: {
                        nome: $('input[name="nome"]').val(),
                        email: $('input[name="email"]').val(),
                        telefone: $('input[name="telefone"]').val(),
                        whatsapp: chk,
                        mensagem: $('textarea[name="textoContato"]').val()
                    },
                    success: function (data) {
                        if (data.success) {
                            Materialize.toast(data.msg, 3000, 'rounded');
                            form.reset();
                            $('button[name="btnContato"]').html('CONTATO');
                            $('button[name="btnContato"]').removeClass('disabled');
                        } else {
                            Materialize.toast(data.msg, 3000, 'rounded');
                            $('button[name="btnContato"]').html('CONTATO');
                            $('button[name="btnContato"]').removeClass('disabled');
                            return false;
                        }
                    }
                });
            }
        });
    }); // end of document ready
})(jQuery); // end of jQuery name space