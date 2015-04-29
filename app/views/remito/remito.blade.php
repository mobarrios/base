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

        <table>
          <thead>
            <tr>
              <th class="service"><img src="assets/images/{{$company->logo}}"></th>
              <th >R</th>
              <th></th>
              <th></th>
              <th class="service">N° 0000 - 00{{$purchase->id}}</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>

      </div>
      <div id="company" class="clearfix">
        <div>Proveedor: {{$purchase->Providers->last_name}}, {{$purchase->Providers->name}}</div>
        <div>Dirección: {{$purchase->Providers->address}}</div>
        <div>Tel: {{$purchase->Providers->phone}}</div>
        <div></div>
      </div>
      <div id="project">
        <div>{{$company->name}}</div>
        <div>{{$company->address}}</div>
        Tel: {{$company->phone}}
        <div><a >{{$company->mail}}</a></div>
        <div>{{$company->iva_condition}}</div>
      </div>

    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="grilla">Cant.</th>
            <th class="grilla">Articulo</th>
            <th class="grilla">P.Unit.</th>
            <th class="grilla">S.Total</th>
          </tr>
        </thead>
        <tbody>
          @foreach($purchase->PurchasesItems as $item )
            <tr>
              <td class="service">{{$item->quantity}}</td>
              <td class="service">{{$item->Items->code}} : {{$item->Items->name}} {{$item->Items->description}}</td>
              <td class="service"> $ {{$item->Items->sell_price}}</td>
              <td class="service ">$ {{ $item->quantity * $item->Items->sell_price  }}</td>
            </tr>
          @endforeach
          <tr>
            <td colspan="3">SUBTOTAL</td>
            <td class="service">$ {{$purchase->amount}}</td>
          </tr>
          <tr>
            <td colspan="3" class="grand total">TOTAL</td>
            <td class="service">$ {{$purchase->amount}}</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTA:</div>
        <div class="notice">Documento no Valido como Factura.</div>
      </div>
    </main>
    <footer></footer>
  </body>
</html>