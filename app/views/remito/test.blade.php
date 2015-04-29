
<style type="text/css">
.header
{
  width: 100%;
  background-color:;
}  
.items
{
  font-size: 8pt;
  width: 100%;
  border-collapse: collapse;
  margin-top: 2em;
  margin-bottom: 1em;
  font-family: "verdana","sans-serif";
}
.items tbody
{
  border: 1px solid #000;
}

.items tbody tr th
{
  border-bottom: 1px solid #000;
}

.items tbody tr td
{
  border-right: 1px solid #000;
  padding: 0.5em;
}

.even_row td
{
  background-color: #F6F6F6;
  border-bottom: 0.9px solid #DDD;
}
.odd_row td
{
  background-color: white;
  border-bottom: 0.9px solid #DDD;
}
</style>
<body>

<div id="body">

<div id="section_header">
</div>

<div id="content">
  
<div class="page" style="font-size: 7pt">

<table class="header">
  <tbody>
    <tr>
      <td width="40%"style="text-align: left">
      <strong><h1>{{Str::upper($company->name)}}</h1></strong>
      <h2>{{$company->razon_social}}</h2>
      <h2>{{$company->address}}</h2>
      <h2>{{$company->phone}}</h2>
      <h2>{{$company->web}}</h2>
      </td>
      <td width="10%"><h1 style="border: solid 1px; text-align: center;">X</h1></td>
      <td width="40%"><h2 style="text-align: right">COMPRA : 000-0{{$purchase->id}}</h2></td>
    </tr>
  </tbody>
</table>


<table style="width: 100%; border-top: 1px solid black; border-bottom: 1px solid black; font-size: 8pt;">
  <tbody>
    <tr>
    <br>
      <td>
        Nombre Apellido: <strong>{{$purchase->Providers->name}} {{$purchase->Providers->name }} </strong>
        <br>
        Cuit/Cuil/Dni :  <strong>{{$purchase->Providers->dni}} / {{$purchase->Providers->cuit }} </strong>
        <br>
        Email :  <strong>{{$purchase->Providers->email}} </strong>
      </td>
      <td>
      Empresa: <strong>{{$purchase->Providers->company_name}} </strong>
      <br>
       Dirección: <strong>{{$purchase->Providers->address}} </strong>
       <br>
        Tel./Cel.: <strong>{{$purchase->Providers->phone}} / {{$purchase->Providers->cell_phone}} </strong>
      </td>
    </tr>
  <br>
  </tbody>
</table>

<table class="items">

  <tbody>
    <tr>
      <td colspan="6"><h3>Articulos:</h3></td>
    </tr>
  </tbody>

  <tbody>
    <tr>
      <th>Cod.</th>
      <th>Articulo</th>
      <th>Cant.</th>
      <th colspan="2">Precio unit.</th>
      <th>Total</th>
    </tr>

    <?php $cont = 0;?>

    @foreach($purchase->PurchasesItems as $item )
      @if($cont % 2 == 0 )
         <tr class="even_row">
      @else
         <tr class="odd_row">
      @endif
        <td style="text-align: center">{{$item->Items->code}}</td>
        <td>{{$item->Items->name}} {{$item->Items->description}}</td>
        <td style="text-align: center">{{$item->quantity}}</td>
        <td style="text-align: right; border-right-style: none;"> ${{$item->price_per_unit}}</td>
        <td class="change_order_unit_col" ></td>
        <td style="text-align: center; border-right-style: none;" class="change_order_total_col">$ {{ $item->quantity * $item->price_per_unit  }}</td>
      </tr>

      <?php $cont ++;?>
    @endforeach
  </tbody>

  <tbody>
    <tr>
      <td colspan="3" style="text-align: right;">(Impuestos Incluidos en la compra)</td>
      <td colspan="2" style="text-align: right;"><strong> TOTAL:</strong></td>
      <td style="text-align: center"><strong>$ {{$purchase->amount}}</strong></td>
    </tr>
  </tbody>

</table>

<table  style="border-top: 1px solid black; padding-top: 2em; margin-top: 2em;">
  <tbody>
  <tr>    
    <td>Firma Comprador :  ______________________________________________________</td>
    <td></td>
    <td>Firma Vendedor :  ________________________________________________________</td>
  </tr>
  </tbody>
</table>

</div>

</div>
</div>

</body>