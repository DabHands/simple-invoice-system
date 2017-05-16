@extends('layout.master')
@section('content')

    <h1 class="text-center text-primary">New Invoice</h1>
    <form action="<?= URL::to('save') ?>" method="post" role="form">
    <input type="hidden" name="_token" value="<?= csrf_token(); ?>" >

    <label for="invoice">Invoice Name</label>
    <select name="invoice_id" id="invoice" class="form-control">
      <option value="0"></option>
      <?php foreach($invoice as $row) : ?>
      <option value="<?php echo $row->id ?>"><?php echo $row->invoice_name ?></option>
      <?php endforeach; ?>
    </select>

    Item Name <input type="text" value="" name="item_name" id="item_name" class = "form-control">
    # of items<input type="text" value="" name="qty" id="qty" class = "form-control">
    Price<input type="text" value="" name="price" id="price" class = "form-control">
    Tax<input type="text" value="" name="tax" id="tax" class = "form-control">    

    <input type="submit" value="Create" class="btn btn-primary">
    </form>

@stop()
