<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <img src="{{ asset('imagenes/logomail.png') }}" alt="vinil-shirt" >
        <h2>Verifica tu direccion de Correo</h2>

        <h4>Bienvenido {{ $name }}</h4>

        <div>
            Gracias por crear una cuenta con Vinil-Shirt. Ahora podras disfrutar de numerables descuentos dentro de la App.
        </div>
        <br>
        <div>
            Porfavor haz click en el Link <a href="{{ URL::to('register/verify/' . $confirmation_code) }}"> {{ URL::to('register/verify/' . $confirmation_code) }}</a> para verificar tu cuenta de correo.
        </div>
        <br><br>
        <div > <font size="2" color="#9f9d9e">
            La información que pueda contener este mensaje, así como su(s) archivo(s) adjunto(s) es totalmente confidencial y va dirigida única y exclusivamente a su destinatario. Si usted lee este mensaje y no es el destinatario señalado, o la persona responsable de entregar el mensaje al destinatario, o ha recibido esta comunicación por error, le recordamos que está prohibida, y puede ser ilegal, cualquier divulgación, distribución o reproducción de esta comunicación, y le rogamos que nos lo notifique inmediatamente y nos devuelva el mensaje original a la dirección arriba mencionada. Gracias.
        </font></div>

    </body>
</html>