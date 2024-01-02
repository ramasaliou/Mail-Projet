<?php
namespace App\Http\Livewire;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;



// use App\Models\Contact;
// use Livewire\Component;

// class EmailSearch extends Component
// {

    // public string $query='meuz';
    // public $search='hello';
    // public $email;


    // public function mount(){
    //     $this->query =  'meuz';
    //     $this->email = [];

    // }

//     public function updatedQuery(){
//         $this->email=Contact::where('email','like','%'.$this->query.'%')->get()->toArray();
//     }

//     public function render()
//     {
//         return view('livewire.email-search');

//     }
// }



use Livewire\Component;
class EmailSearch extends Component
{
    public $ottPlatform = '';
 
    //public $webseries=Contact::all();  
    public function render()
    {
        $webseries =Contact::all();

        //dd($webseries);
       // dd($array);
        return view('livewire.email-search',[
            'webseries'=>$webseries,
        ])->extends('layouts.app');
    }
}