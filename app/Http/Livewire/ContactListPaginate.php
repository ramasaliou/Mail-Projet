<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ContactListPaginate extends Component
{
    use WithPagination;
   public $search;
   public $byFirstName='';
   public $checkedContact=[];

    public function render()
    {

        $admine = DB::table('contacts')
        ->join('roles', 'contacts.id', '=', 'roles.contact_id')
        ->where('type', '=', 'admine')
        ->select('contacts.*', 'roles.*')
        ->get();

        $stagiaire = DB::table('contacts')
        ->join('roles', 'contacts.id', '=', 'roles.contact_id')
        ->where('type', '=', 'stagiaire')
        ->select('contacts.*', 'roles.*')
        ->get();

        $membre = DB::table('contacts')
        ->join('roles', 'contacts.id', '=', 'roles.contact_id')
        ->where('type', '=', 'membre')
        ->select('contacts.*', 'roles.*')
        ->get();
        $total=Contact::all();

        return view('livewire.contact-list-paginate',[
            //'contact'=>Contact::paginate(10),
            'contact'=>Contact::when($this->byFirstName,function($query){
                $query->where('id',$this->byFirstName);
            })
                ->search(trim($this->search))
                ->paginate(10),
           
            'admine'=>count($admine),
            'stagiaire'=>count($stagiaire),
            'membre'=>count($membre),
            'total' =>count($total),
        ]);
    }
    public function deleteContact($id){
        $del= Contact::find($id)->delete();
        // if($del){
        //     $this->dispatchBrowserEvent('delete');
        // }
    }
    public function message(){
     $data=implode(",",$this->checkedContact);
       
    //return view('test',$data);
       return redirect()->to(route('sendmailchedek',['id'=>$data]));
    }
}