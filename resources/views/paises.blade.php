<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    <h1>Paises de la región </h1>
 <table class ="table table-striped">
     <thead>
         <tr>
             <th>
                 País
             </th>
             <th>
                 Capital
             </th>
             <th>
                 Moneda
             </th>
             <th>
                 Población
             </th>
             <th style="background-color: #0000">
                 Ciudades
             </th>
         </tr>
     </thead>
     <tbody>
     @foreach($paises as $pais => $infopais)
         <tr>
             <td rowspan='{{count($infopais["ciudades"])}}'>
                {{ $pais }} 
            </td>
             <td rowspan='{{count($infopais["ciudades"])}}'>
                {{ $infopais["capital"] }} 
             </td>
             <td rowspan='{{count($infopais["ciudades"])}}'>
                 {{ $infopais["moneda"] }} 
             </td>
             <td rowspan='{{count($infopais["ciudades"])}}'>
                 {{ $infopais["poblacion"] }} 
              </td>
              @foreach($infopais["ciudades"] as $ciudad)
                <td style="background-color: #B3F7F3" >{{$ciudad}}</td>   
         </tr>
            @endforeach

         @endforeach
     </tbody>
     <body></body>
     <tfoot></tfoot>
 </table>
</body>
</html>
