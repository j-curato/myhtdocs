<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Client\Client as Client;
use Excel;


class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
      $clients = Client::all();
    	return view('clients/clients_crud', ['clients' => $clients]);
    }

    public function store( Request $request ){

    	$clients = Client::create( $request->all() );

           if( $clients ){

             $notification = "Success";

           } else{

             $notification = "Failed";

           }

           return json_encode(array('notify'=>$notification)); 
    }

    public function updateClient( Request $request ){

      $updateClient = Client::where( 'id', $request['id'] )
                            ->update( $request->all() );
   
           if( $updateClient ){
             $notification = "Success";
           } else{
             $notification = "Failed";
           }

         return json_encode(array('notify'=>$notification)); 

    }

    public function exportClient( $param = null ){

         ob_end_clean();
         ob_start();

         if( !$param ){

          Excel::create('ClientList', function($excel){

              $excel->sheet('Clientlist', function($sheet){
              $clients = Client::orderBy('client_name', 'asc')->get();
              $sheet->loadView('clients/view_client_excel', [ 'clients' => $clients ]);

            });

          })->download('xls');

         }else{

          return redirect()->back()->with( 'message', 'Cannot export with the parameter '.$param.'. Please contact developer for additional functions needed. Thank you.' );                   

        }

    }

}// end of controller
