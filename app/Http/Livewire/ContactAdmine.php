<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ContactAdmine extends Component
{
    public function render()
    {

        $admine = DB::table('contacts')
        ->join('roles', 'contacts.id', '=', 'roles.contact_id')
        ->where('type', '=', 'admine')
        ->select('contacts.*', 'roles.*')
        ->get();

        //les contaacts admine
        $contactAdmine = DB::table('contacts')
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

        return view('livewire.contact-admine',[
            'contact'=>$contactAdmine,
            'admine'=>count($admine),
            'stagiaire'=>count($stagiaire),
            'membre'=>count($membre),
            'total' =>count($total),
        ]);
    }
   
}
