<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Eurofarma</title>
    <style>
        a:hover {
            background-color: #2b93a5 !important;
        }
    </style>
</head>
<body style="margin: 0; padding: 0;">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;border: 1px solid #00478e ;font-family: Arial, sans-serif;">
    <tbody>
    <tr>
        <td bgcolor="#ffffff  " style="padding: 40px 30px 40px 30px;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                <!--logotipo-->
                <tr style="">
                    <td align="center" style="padding: 5px 0px 5px 0px;">
                        <img src="{{url('images/eurofarma_logo.png')}}" height="100" alt="Eurofarma" style="display: block;"/>
                    </td>
                </tr>
            </table>
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tbody>
                <!--Mensagem corpo-->
                <tr>
                    <td style="padding: 20px 0 0 1; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;"
                        colspan="3">
                        <!--b>Mensagem</b-->
                        <div>Olá, {{$nome}}, clique <a href="{{url('redefinir-senha/' . $token)}}">AQUI</a> para redefinir sua senha de acesso ao aplicativo Eurofarma.</div>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <!--rodapï¿½-->
    <tr>
        <td bgcolor="#333" style="padding: 30px 30px 30px 30px; border-top: 0; background-color: #00478e; text-align: center; text-transform: uppercase;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tbody>
                <tr>
                    <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 10px; text-align: center;">

                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>