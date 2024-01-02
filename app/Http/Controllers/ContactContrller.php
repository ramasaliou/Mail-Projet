<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactContrller extends Controller
{
    public function addContact(Request $request){



        $request->validate([
            'firstName' =>'required',
            'lastName' =>'required',
            'email' =>'required|email',
            'phone'=>'required',
           
            
        ]);

        $contact=Contact::create(
           [ 
            'firstName'=>$request['firstName'],
            'lastName'=>$request['lastName'],
            'email'=>$request['email'],
            'phone'=>$request['phone'],
            ]
           );
          
           $array=[$request->membre,
                    $request->admine,
                    $request->stagiaire];
            $tab=array_filter($array);

            foreach($tab as $tab){
                $role=$contact->Role()->create([
                    'type'=>$request[$tab],
                ]);
            }
      
            return redirect()->back()->with('success', 'Contact add successfully');

    }

    public function index(){
          // return Pointage::join('pointeurs','pointages.pointeur_id','=','pointeurs.id')->get('pointeur*','pointage*');
    //    $contact = DB::table('contacts')
    //    ->join('roles', 'contacts.id', '=', 'roles.contact_id')
    //    //->where('type', '=', 'stagiaire')
    //    ->select('contacts.*', 'roles.*')
    //   ->get();
           // $contact=Contact::paginate(2);

    //   dd($contact);

      return view('listContact');
    }
    public function indexAdmine(){
        // return Pointage::join('pointeurs','pointages.pointeur_id','=','pointeurs.id')->get('pointeur*','pointage*');
  //    $contact = DB::table('contacts')
  //    ->join('roles', 'contacts.id', '=', 'roles.contact_id')
  //    //->where('type', '=', 'stagiaire')
  //    ->select('contacts.*', 'roles.*')
  //   ->get();
          $contact=Contact::paginate(2);

  //   dd($contact);

    return view('listContactAdmin', compact('contact'));
  }

  public function indexStagiare(){

      $contact=Contact::paginate(2);

//   dd($contact);

return view('listContactStagiaire', compact('contact'));
}
}
