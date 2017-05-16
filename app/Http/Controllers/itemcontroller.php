<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use Illuminate\Pagination\LengthAwarePaginator;

class itemcontroller extends Controller
{
  public function index()
  {
  //   $result = DB::table('items')->paginate(5);
  //   // $r = DB::table('invoices')->get();
  // return view('item.index')->with('data',$result);
   $result=  DB::table('items')->select('items.id','items.item_name','items.qty','items.price','items.invoice_id','invoices.invoice_name')->join('invoices','invoices.id','=','items.invoice_id')->get();
   

   return view('item.index')->with('data',$result);
  }

  public function form()
  {
    $result = DB::table('invoices')->get();
  return view('item.form')->with('invoice',$result);
  }

  public function save(Request $request)
      {
        $post = $request->all();

          $data = array(
              'invoice_id'=>$post['invoice_id'],
              'item_name'  => $post['item_name'],
              'price' => $post['price'],
              'qty'   => $post['qty'],
              );
          $i = DB::table('items')->insert($data);
          if($i > 0)
          {
          \Session::flash('message','Record Have Beeen Save Success');
          return redirect('itemindex');
        }
      }
      public function edit($id)
    {
        $row = DB::table('items')->where('id',$id)->first();
        return view('product.edit')->with('row',$row);
    }

    public function update(Request $request)
           {
               $post = $request->all();

                   $data = array(
                       'product_name'  => $post['product_name'],
                       'product_price' => $post['product_price'],
                       'product_qty'   => $post['product_qty'],
                       );
                   $i = DB::table('products')->where('id', $post['id'])->update($data);
                   if($i > 0)
                   {
                       \Session::flash('message','Record Have Been Update Success');
                       return redirect('productindex');
                   }
               }

    public function delete($id)
        {
            $i = DB::table('products')->where('id',$id)->delete();
            if($i > 0)
            {
                \Session::flash('message','Record Have Beeen Delete Successfully');
                return redirect('productindex');
            }
        }

}
