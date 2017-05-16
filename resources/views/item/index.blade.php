@extends('layout.master')
@section('content')

<h2 class="text-center text-primary">Simple Invoice System</h2>

<div class="col-md-offset-2 col-md-8">
        @if (Session::has('message'))
                <!-- Success Message -->
        <div class="alert alert-success">
            <strong>Success</strong>
            <br>
            {{ Session::get('message') }}
        </div>
        @endif
    </div>
    <!-- myfun script -->
<script type="text/javascript">
function myFunction(){
  var input, filter, table, tr, td, i;
  input = document.getElementById('myInput');
  filter=input.value.toUpperCase();
  table=document.getElementById('myTable');
  tr=table.getElementsByName('tr');
  for(i=0;i<tr.length;i++)
  {
    td=tr[i].getElementsByName('td')[0];
    if(td)
    {
      if(td.innerHTML.toUpperCase().indexOf(filter)> -1)
      {
        tr[i].style.display="";
      }
      else {
        tr[i].style.display="none";
      }
    }
  }
}

</script>
  <!-- myfun script -->

<a href="<?= 'itemform' ?>" class="btn btn-primary "><img src="images/add.png" alt="">Add Invoice</a>
<br><br>
<input type="text" id="myInput" onkeyup="myFunction()" style="width:200px;color:#fff;" placeholder="Invoice Name...">
<!-- <span class="input-group-btn">
  <input class="btn btn-default" type="text" placeholder="Search! Invoice Name">
</span> -->
<br><br>
<table class = 'table table-bordered table-hover' id="myTable">
<thead style="background: #337ab7;">
<th>Invoice Name</th>
<th>#of Items</th>
<th>Total</th>
<th>Tax</th>
<th>Action</th>
</thead>
<tbody>
<?php
foreach($data as $row){
?>
<tr>
<td><?= $row->invoice_name ?></td>
<td><?= $row->qty ?></td>
<td><?= $row->price*$row->qty ?></td>
<td><?= ($row->price*$row->qty)*(2/100) ?></td>

<td>
    <a href= "<?= 'EditItem/'. $row->id ?>">PDF</a> |
    <a href= "<?= 'DeleteItem/'.$row->id ?>">Remove</a>
</td>
</tr>
<?php } ?>
</tbody>

</table>
@stop
