$(document).ready(function() {
    $('a').click(function(event) {

        let target = $(this).attr('href')

        if (!target.includes('http') && !target.includes('.html')) {
            event.preventDefault()
            $("html, body").animate({ scrollTop: $(target).offset().top }, 1000)
        }
    })

    $('#btn-enviar').click(function() {
        event.preventDefault()

        let campos = $('#formulario-fale-conosco').serializeArray()

        if (campos.every(campo => campo.value != "")) {

            $.post('email.php', campos, function(response) {
            
                response = JSON.parse(response)
    
                if (response.status) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Sucesso!',
                        html: response.mensagem,
                        showConfirmButton: false,
                        timer: 1500
                    })
                } else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Falha!',
                        html: response.mensagem,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
                
            })
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, preencha todos os campos!'
            })
        }
    })

    var btn = $('#btnBackTop')

    $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
            btn.addClass('show')
        } else {
            btn.removeClass('show')
        }
    })
})
