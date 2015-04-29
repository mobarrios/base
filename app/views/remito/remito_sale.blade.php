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
              <th class="service">N° 0000 - 00{{$sales->id}}</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>

      </div>
      <div id="company" class="clearfix">
        <div><strong>{{$sales->Clients->last_name}}, {{$sales->Clients->name}}</strong></div>
        <div>{{$sales->Clients->address}}</div>
        <div>{{$sales->Clients->phone}}</div>
        <div>{{$sales->Clients->email}}</div>
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
          @foreach($sales->SalesItems as $item )
            <tr>
              <td class="service">{{$item->quantity}}</td>
              <td class="desc">{{$item->Items->code}} : {{$item->Items->name}} {{$item->Items->description}}</td>
              <td class="service"> $ {{$item->price_per_unit}}</td>
              <td class="service ">$ {{ $item->quantity * $item->price_per_unit  }}</td>
            </tr>
          @endforeach
          <tr>
            <td colspan="3">SUBTOTAL</td>
            <td class="service">$ {{$sales->amount}}</td>
          </tr>
          <tr>
            <td colspan="3" class="grand total">TOTAL</td>
            <td class="service">$ {{$sales->amount}}</td>
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