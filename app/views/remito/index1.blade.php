<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Remito</title>
    <link rel="stylesheet" href="assets/remito/style.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="assets/images/logo.png" width="176" align="left">
      </div>
      <h5 align="right">REMITO Nº {{$purchase->id}}</h5>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p><br>
        <br>
      </p>
      <div id="project">
        <div>FECHA: {{$purchase->purchases_date}}</div>
        <div>ING. BRUTOS: 20-25615885-5</div>
        <div>FECHA INICIO ACT.: 01/01/2015</div>
        <div>I.V.A. RESPONSABLE INSCRIPTO</a></div>
      </div>
      <div id="company" class="clearfix">
        
        <div><span>Cliente:</span> {{$purchase->Providers->company_name}}</div>
        <div><span>Direccion:</span> {{$purchase->Providers->address}}</div>
        <div><span>Tel.:</span> {{$purchase->Providers->phone}} / {{$purchase->Providers->cell_phone}}</div>
        <div><span>E-mail:</span> {{$purchase->Providers->email}}</div>
        
      </div>
    </header>
  <main>
      <table>
        <thead>
          <tr>
            <th class="service">Cod.</th>
            <th class="service">Cant.</th>
            <th class="desc">Descripcion</th>
            <th>P.Unitario</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
        @foreach($purchase->PurchasesItems as $item)
          <tr>
           <td class="qty" align="center">{{$item->Items->code}}</td>
            <td class="service" align="center">{{$item->quantity}}</td>
            <td class="desc"><strong>{{$item->Items->name}}</strong> . {{$item->Items->description}}</td>
            <td class="unit">$ {{$item->Items->sell_price}}</td>
          
            <?php
             $total = $total + $item->quantity * $item->Items->sell_price ;
            
            ?>
            <td class="total">$ {{ $total }}</td>
          </tr>
          @endforeach
          
          <tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total">$ {{$total}}</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">TOTAL</td>
            <td class="grand total">$ {{$total}}</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>REMITO:</div>
        <div class="notice">Documento no valido como Factura.</div>
      </div>
    </main>
  </body>
</html>