<?php

namespace App\Http\Controllers\Agent;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Agent\Agent as Agent;
use Excel;

class AgentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $agents = Agent::all();
    	  return view('agents/agents_crud', ['agents' => $agents]);
    }

    public function store( Request $request ){

    	$agent = Agent::create( $request->all() );

           if( $agent ){

             $notification = "Success";

           } else{

             $notification = "Failed";

           }

           return json_encode(array('notify'=>$notification)); 
    }

    public function updateAgent( Request $request ){

      $updateAgent = Agent::where('id', $request['id'])
                          ->update($request->all());
   
           if($updateAgent){
             $notification = "Success";
           } else{
             $notification = "Failed";
           }

         return json_encode(array('notify'=>$notification)); 

    }


    public function exportAgents( $param = null ){

         ob_end_clean();
         ob_start();

         if( !$param ){

          Excel::create('AgentList', function($excel){

              $excel->sheet('Agentlist', function($sheet){
              $agents = Agent::orderBy('fname', 'asc')->get();
              $sheet->loadView('agents/view_agents_excel', [ 'agents' => $agents ]);

            });

          })->download('xls');

         }else{

          return redirect()->back()->with( 'message', 'Cannot export with the parameter '.$param.'. Please contact developer for additional functions needed. Thank you.' );                   

        }

    }


}//end of controller
