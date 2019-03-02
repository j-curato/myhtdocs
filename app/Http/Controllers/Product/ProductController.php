<?php
namespace App\Http\Controllers\Product;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product\Product as Product;
use Excel;

class ProductController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $conditionTxt = "Medical and Lab Supplies";
        $products = Product::where('category', 'ILIKE', '%'.$conditionTxt.'%')
                            ->get();
        return view('products/products_crud', ['products' => $products]);
    }


    public function create(){

    }
  
    public function store(Request $request){

          $products = Product::create($request->all());
 
           if($products){

             $notification = "Success";

           } else{
             $notification = "Failed";
           }

           return json_encode(array('notify'=>$notification)); 

         /* if($request->ajax()){
            return json_encode(array('notify'=> $request->all())); 
          }*/

    }

    public function getprod(Request $request){

      $prod_ids = $request['prod_IDs'];
      $prod_details = Product::find($prod_ids);
      return json_encode(array('prodval' => $prod_details));

    }

    public function update_product( Request $request ){

        $updateProd = Product::where('id', $request['prod_id'])
                              ->update(['pharmaceutical' =>  $request['editPharma'], 
                                        'description'    =>  $request['editDesc'],
                                        'type'           =>  $request['editType'],
                                        'unit'           =>  $request['editUnit'],
                                        'category'       =>  $request['editCat'],
                                        'price'          =>  $request['editPrice']
                                      ]);
   
           if($updateProd){
             $notification = "Success";
           } else{
             $notification = "Failed";
           }

         return json_encode(array('notify'=>$notification)); 

    }

    
    public function getpharma(Request $request){

      $products =  Product::orderBy('pharmaceutical','asc')
                             ->where('category', 'ILIKE', '%'.$request->segment(1).'%')
                             ->get();
      return view('products/products_crud_pharma', ['products' => $products]);

    }

    public function exportProduct( $param = null ){

         ob_end_clean();
         ob_start();

         if( !$param ){

          Excel::create('ProductReport', function($excel){

              $excel->sheet('product_sheet', function($sheet){
              $conditionTxt = "Medical and Lab Supplies";
              $products = Product::where('category', 'ILIKE', '%'.$conditionTxt.'%')
                                 ->orderBy('created_at', 'desc')
                                 ->get();
              $sheet->loadView('products/product_excel_view', [ 'products' => $products ]);

            });

          })->download('xls');

        } else{

          /*$products = InventoryRecord::orderBy('pharmaceutical','asc')
                             ->where('type', 'ILIKE', '%'.$param.'%')
                             ->orwhere('unit', 'ILIKE', '%'.$param.'%')
                             ->get();*/
                         
          return redirect()->back()->with( 'message', 'Cannot export with the parameter '.$param.'. Please contact developer for additional functions needed. Thank you.' );                   

        }

    }


    public function exportProductPharma( $param = null ){

         ob_end_clean();
         ob_start();

         if( !$param ){

          Excel::create('ProductReport', function($excel){

              $excel->sheet('product_sheet', function($sheet){
              $conditionTxt = "Pharma";
              $products = Product::where('category', 'ILIKE', '%'.$conditionTxt.'%')
                                 ->orderBy('created_at', 'desc')
                                 ->get();
              $sheet->loadView('products/product_excel_view', [ 'products' => $products ]);

            });

          })->download('xls');

        } else{

          /*$products = InventoryRecord::orderBy('pharmaceutical','asc')
                             ->where('type', 'ILIKE', '%'.$param.'%')
                             ->orwhere('unit', 'ILIKE', '%'.$param.'%')
                             ->get();*/
                         
          return redirect()->back()->with( 'message', 'Cannot export with the parameter '.$param.'. Please contact developer for additional functions needed. Thank you.' );                   

        }

    }

    public function export_inventory(){

        ob_end_clean();
        ob_start();
        Excel::create('ProductInventory', function($excel) {
        $excel->sheet('Products', function($sheet) {
          $products = Product::orderBy('created_at','desc')->get();
          $sheet->loadView('products/product_excel_view', ['products' => $products->toArray()]);
        });
        })->download('xls');

   }

}//end controller