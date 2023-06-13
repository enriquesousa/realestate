<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Invoice</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }

        .font {
            font-size: 15px;
        }

        .authority {
            /*text-align: center;*/
            float: right
        }

        .authority h5 {
            margin-top: -10px;
            color: green;
            /*text-align: center;*/
            margin-left: 35px;
        }

        .thanks p {
            color: green;
            ;
            font-size: 16px;
            font-weight: normal;
            font-family: serif;
            margin-top: 20px;
        }
    </style>

</head>

<body>

    <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">

        <tr>
            <td valign="top">
                <!-- {{-- <img src="" alt="" width="150"/> --}} -->
                <h2 style="color: green; font-size: 26px;"><strong>Recibo: {{ $packageHistory->invoice }}</strong></h2>
            </td>
            <td align="right">
                <pre class="font">
                    Fotos Oficiales
                    Email:fotosoficialest@fotos.com
                    Cel: 664-188-0604
                    Av. Playas de Tijuana 1207
                    Tijuana BC
                </pre>
            </td>
        </tr>

    </table>


    <table width="100%" style="background:white; padding:2px;"></table>

    <table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
        <tr>
            <td>
                <p class="font" style="margin-left: 20px;">
                    <strong>Name:</strong> {{ $packageHistory->user->name }} <br>
                    <strong>Email:</strong> {{ $packageHistory->user->email }} <br>
                    <strong>Phone:</strong> {{ $packageHistory->user->phone }} <br>
                    <strong>Address:</strong>{{ $packageHistory->user->address }}
                </p>
            </td>
            <td>
                <p class="font" style="margin-left: 20px;">
                    <strong><span style="color: green;">Recibo:</span></strong>{{ $packageHistory->invoice }}<br>
                    <strong>Fecha:</strong> {{ $packageHistory->created_at }}<br>
                    <strong>Tipo de Pago:</strong>COD<br>
                </p>
                {{-- <pre class="font">
                    <h3><span style="color: green;">Recibo:</span> #{{ $packageHistory->invoice }}</h3>
                    Fecha: {{ $packageHistory->created_at }}
                    Tipo de Pago: COD
                </pre> --}}
                {{-- <p class="font">
                    <h3><span style="color: green;">Recibo:</span> #{{ $packageHistory->invoice }}</h3>
                    Fecha: {{ $packageHistory->created_at }} <br>
                    Tipo de Pago: COD </span>
                </p> --}}
            </td>
        </tr>
    </table>

    <br />

    <h3>Paquetes Adquiridos</h3>

    <table width="100%">
        <thead style="background-color: green; color:#FFFFFF;">
            <tr class="font">
                <th>Nombre</th>
                <th class="text-end">Cantidad</th>
                <th class="text-end">Costo Unitario</th>
                <th class="text-end">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr class="font">
                <td align="center">{{ $packageHistory->package_name }}</td>
                <td align="center">{{ $packageHistory->package_credits }}</td>
                <td align="center">$ {{ $packageHistory->package_amount }}</td>
                <td align="center">$ {{ $packageHistory->package_amount }}</td>
            </tr>
        </tbody>
    </table>


    <div class="thanks mt-3">
        <p>Gracias por su compra..!!</p>
    </div>
    <div class="authority float-right mt-5">
        <p>-----------------------------------</p>
        <h5>Firma de Aprobación:</h5>
    </div>
</body>

</html>
