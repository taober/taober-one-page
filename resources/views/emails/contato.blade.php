<html>
    <body>
        <p>Olá João!</p>
        <p></p>
        <p>{{ $mail['nome'] }}, acaba de mandar uma mensagem pelo site :-).</p>
        <p></p>
        <p>O assunto é {{ $mail['assunto'] }} </p>
        <p>Seu email é {{ $mail['email'] }} </p>
        <p>seu telefone é {{ $mail['telefone'] }} </p>
        <p>Escreveu:<br> {{ $mail['mensagem'] }} </p>

        <p>Boa Sorte! Bip Bip</p>
    </body>
</html>