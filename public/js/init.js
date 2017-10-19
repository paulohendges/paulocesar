(function ($) {
    $(function () {
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

        $('a.nav-links').click(function () {
            $(this).closest('ul').find('li').removeClass('active');
            $(this).parent().addClass('active');
        })
        $('.button-collapse').sideNav({'closeOnClick': true});
        $('.parallax').parallax();
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
                    required: true
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
                    required: "Campo Obrigatório"
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
                form.submit();
            }
        });
    }); // end of document ready
})(jQuery); // end of jQuery name space