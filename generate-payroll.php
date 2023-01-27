<?php

  ob_start();

  require_once __DIR__ . '/vendor/autoload.php';

    if(!empty($_POST["send"])) {
      $sales_rep = $_POST["sales_rep"];
      $bonuses = $_POST["bonuses"];
      $date_range = $_POST["date_range"];
      $client_name = $_POST["client_name"];
      $comm_amount = $_POST["comm_amount"];
      $annual_prem = "3000";
      $balance_amount = ($annual_prem-$comm_amount);


      if(empty($_POST["bonuses"])){
        if ($sales_rep=="sr_1") {
          $bonuses = "2";
        }
        if ($sales_rep=="sr_2") {
          $bonuses = "3";
        }
      }

      if($sales_rep=="sr_1"){
        $comm_rate = "60";
        $tax_rate = "5";
        $sales_rep_name = "Sales Rep 1";
      }
      if($sales_rep=="sr_2"){
        $comm_rate = "50";
        $tax_rate = "10";
        $sales_rep_name = "Sales Rep 2";
      }


      $comm_net = ($comm_amount*($comm_rate/100));
      $comm_tax = ($comm_net*($tax_rate/100));
      
      $total_amount = ($comm_net-$comm_tax)+$bonuses;

      $date_today = date("F j, Y");

      //$password = $_POST['password'];
      echo $sales_rep." ".$date_range." ".$bonuses." ".$comm_rate." ".$tax_rate." ".$comm_net." ".$comm_tax." ".$total_amount ;

    }

  $mpdf = new \Mpdf\Mpdf();

 $html = '<html>
<head>
<style>
body {font-family: sans-serif;
  font-size: 10pt;
}
p { margin: 0pt; }
table.items {
  border: 0.1mm solid #000000;
}
td { vertical-align: top; }
.items td {
  border-left: 0.1mm solid #000000;
  border-right: 0.1mm solid #000000;
}
table thead td { background-color: #EEEEEE;
  text-align: center;
  border: 0.1mm solid #000000;
  font-variant: small-caps;
}
.items td.blanktotal {
  background-color: #EEEEEE;
  border: 0.1mm solid #000000;
  background-color: #FFFFFF;
  border: 0mm none #000000;
  border-top: 0.1mm solid #000000;
  border-right: 0.1mm solid #000000;
}
.items td.totals {
  text-align: right;
  border: 0.1mm solid #000000;
}
.items td.cost {
  text-align: center;
}
.voucher_title {
  font-size: 20pt;
}

</style>



</head>
<body>

<div>

<img src="assets/img/hero-carousel/ONLINEINsure.png">

</div>

<div style="text-align: center">



<p class="voucher_title" >Buyer Created Tax Invoice</p>

</div>

<br />

<div style="text-align: right"> Date:' .$date_today. '</div>


<table width="100%" style="font-family: serif;" cellpadding="10">

<tr>

<td width="50%" style="background-color: #d3d3d3; ">
<p style="text-align:left;">Sales Rep:' .$sales_rep_name. '</p>
<td width="50%" style="background-color: #d3d3d3; ">
<p style="text-align:right;">' .$date_range. '</p>

</tr>

</table>
<table width="100%" style="font-family: serif;" cellpadding="10">

<tr>

<td width="10%">
<p style="text-align:left;">Produced On:</p>
<td width="20%">
<p style="text-align:left;">'.$date_today.'</p><br>
<p style="text-align:left;">'.$sales_rep_name.'</p>
<p style="text-align:left;">44 Glen Atkinson Street</p>
<p style="text-align:left;">1071 Auckland, New Zealand</p><br>
<td width="20%">
<p style="text-align:center;">Produced By:</p><br>
<p style="text-align:center;">OnlineInsure</p>
<p style="text-align:center;">44 Glen Atkinson Street</p>
<p style="text-align:center;">1071 Auckland, New Zealand</p>
<p style="text-align:center;">(027) 2801-469</p><br>
<td width="40%">
<p style="text-align:left;">Statement Date:' .$date_today. '</p>
<p style="text-align:left;">Payment Type: Debit</p>

</tr>

</table>


<br />
<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
<thead>
<tr>
<td width="30%">Description</td>
<td width="30%"></td>
<td width="20%"></td>
</tr>
</thead>

<tbody>

<!-- ITEMS HERE -->
<tr>
<td class="totals cost"> Commissions </td>
<td class="totals cost">$' .$comm_amount. '</td>
<td class="totals cost">$' .$comm_amount. '</td>

</tr>
<!-- END ITEMS HERE -->

<tr>
<td class="totals cost">Commission Rate</td>
<td class="totals cost">' .$comm_rate. '% </td>
<td class="totals cost">$' .$comm_net. '</td>
</tr>

<tr>
<td class="totals cost">Tax Rate</td>
<td class="totals cost">' .$tax_rate. '% </td>
<td class="totals cost">$' .$comm_tax. '</td>
</tr>


<tr>
<td class="totals cost">Bonuses</td>
<td class="totals cost">$' .$bonuses. '</td>
<td class="totals cost">$' .$bonuses. ' </td>
</tr>

<tr>
<td class="blanktotal" colspan="1" rowspan="9"></td>
</tr>


<tr>
<td class="totals cost"><b>Total Amount:</b></td>
<td class="totals cost"><b>$' .$total_amount. '</b></td>
</tr>
<tr>


</tbody>


</table>
<br /> <br />
<div style="text-align: center; font-style: italic;"> © OnlineInsure 2023</div>
</body>
</html>';

$mpdf->WriteHTML($html);

$mpdf->AddPage();

 $html_1 = '<html>
<head>
<style>
body {font-family: sans-serif;
  font-size: 10pt;
}
p { margin: 0pt; }
table.items {
  border: 0.1mm solid #000000;
}
td { vertical-align: top; }
.items td {
  border-left: 0.1mm solid #000000;
  border-right: 0.1mm solid #000000;
}
table thead td { background-color: #EEEEEE;
  text-align: center;
  border: 0.1mm solid #000000;
  font-variant: small-caps;
}
.items td.blanktotal {
  background-color: #EEEEEE;
  border: 0.1mm solid #000000;
  background-color: #FFFFFF;
  border: 0mm none #000000;
  border-top: 0.1mm solid #000000;
  border-right: 0.1mm solid #000000;
}
.items td.totals {
  text-align: right;
  border: 0.1mm solid #000000;
}
.items td.cost {
  text-align: center;
}
.voucher_title {
  font-size: 20pt;
}

</style>



</head>
<body>

<div>

<img src="assets/img/hero-carousel/ONLINEINsure.png">

</div>

<div style="text-align: center">



<p class="voucher_title" >Detailed Commission Statement</p>

</div>

<br />

<div style="text-align: right"> Date:' .$date_today. '</div>


<table width="100%" style="font-family: serif;" cellpadding="10">

<tr>

<td width="50%" style="background-color: #d3d3d3; ">
<p style="text-align:left;">Sales Rep:' .$sales_rep_name. '</p>
<td width="50%" style="background-color: #d3d3d3; ">
<p style="text-align:right;">' .$date_range. '</p>

</tr>

</table>



<br />
<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
<thead>
<tr>
<td width="30%">CLient Name</td>
<td width="30%">Annual Premium</td>
<td width="20%">Commission</td>
<td width="20%">Balance</td>
</tr>
</thead>

<tbody>

<!-- ITEMS HERE -->
<tr>
<td class="totals cost">' .$client_name. '</td>
<td class="totals cost">$'.$annual_prem. '</td>
<td class="totals cost">$' .$comm_amount. '</td>
<td class="totals cost">$' .$balance_amount. '</td>

</tr>
<!-- END ITEMS HERE -->


<tr>
<td class="totals cost"><b>Total:</b></td>
<td class="totals cost"><b>$'.$annual_prem. '</b></td>
<td class="totals cost"><b>$' .$comm_amount. '</b></td>
<td class="totals cost"><b>$' .$balance_amount. '</b></td>
</tr>





</tbody>


</table>
<br /> <br />
<div style="text-align: center; font-style: italic;"> © OnlineInsure 2023</div>
</body>
</html>';

$mpdf->WriteHTML($html_1);

ob_end_clean();
$mpdf->Output('elite_generated.pdf', 'D');
  
?>