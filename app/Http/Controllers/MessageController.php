<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class MessageController extends Controller
{
    public function sendMail(Request $request){
        $request->validate([
            'name' =>'required',
            'email' =>'required|email',
            'subject'=>'required',
            'message' =>'required'
            
        ]);
    $piece="";
        try {
            $path='/upload';
        $newname=Helper::renameFile($path,$request->file('piecejoint')->getClientOriginalName());
        $upload=$request->piecejoint->move(public_path($path),$newname);
        $piece=$request->file('piecejoint')->getClientOriginalName();
        } catch (\Throwable $th) {
           
        }
        //dd($piece);

        if ($this->isOnline()) {
  
            $mail_data=[
                'recipient'=>'utilisateurp2021@gmail.com',
                'fromEmail'=>$request->email,
                'formName'=>$request->lastName,
                'subject'=>$request->subject,
                'body'=>$request->message,
                'piecejoint'=>$piece,
            ];
          
            // if (!preg_match("^[a-z0-9](\.?[a-z0-9]){5,}@g(oogle)?mail\.com$",$mail_data['fromEmail'])) {
            //     return redirect()->back()->withInput()->with('errormail','incorrect email address');
            //   }
        
          if ($piece==='') {
            Mail::send('email-template',$mail_data,function($message)use($mail_data){
                $message->to($mail_data['fromEmail'])
                        ->from($mail_data['recipient'])
                        ->subject($mail_data['subject']);
                       
            });
          }else{
            Mail::send('email-template',$mail_data,function($message)use($mail_data){
                $message->to($mail_data['fromEmail'])
                        ->from($mail_data['recipient'])
                        ->subject($mail_data['subject'])
                        ->attach(public_path('upload/'.$mail_data['piecejoint']));
            });
        }
        }
            return redirect()->back()->with('success', 'Email send successfully');
       
        // }else{
        //     return redirect()->back()->withInput()->with('error','Check your internet connection');
        // }
    }
    
    public function sendMailgroupe(Request $request){
        $request->validate([
            // 'name' =>'required',
            // 'typemail' =>'required',
            // 'subject'=>'required',
            // 'message' =>'required'
            
        ]);
        $piece="";

        try {
            $path='/upload';
        $newname=Helper::renameFile($path,$request->file('piecejoint')->getClientOriginalName());
        $upload=$request->piecejoint->move(public_path($path),$newname);
        $piece=$request->file('piecejoint')->getClientOriginalName();
        } catch (\Throwable $th) {
           
        }
        $array=[$request->membre,
        $request->admine,
        $request->stagiaire];
        $tab=array_filter($array);
        foreach($tab as $tab){

       
        $contact = DB::table('contacts')
        ->join('roles', 'contacts.id', '=', 'roles.contact_id')
        ->where('type', '=', $tab)
        ->select('contacts.*', 'roles.*')
        ->get();

      //  dd($contact);

        
        if ($this->isOnline()) {

            for ($i=0; $i <count($contact) ; $i++) { 
              // dd($contact[$i]);
          
            
            $mail_data=[
                'recipient'=>'utilisateurp2021@gmail.com',
                'fromEmail'=>$contact[$i]->email,
                'formName'=>$contact[$i]->lastName,
                'subject'=>$request->subject,
                'body'=>$request->message,
                'piecejoint'=>$piece
            ];
          
            // if (!preg_match("^[a-z0-9](\.?[a-z0-9]){5,}@g(oogle)?mail\.com$",$mail_data['fromEmail'])) {
            //     return redirect()->back()->withInput()->with('errormail','incorrect email address');
            //   }
        
            if ($piece==='') {
                Mail::send('email-template',$mail_data,function($message)use($mail_data){
                    $message->to($mail_data['fromEmail'])
                            ->from($mail_data['recipient'])
                            ->subject($mail_data['subject']);
                           
                });
              }else{
                Mail::send('email-template',$mail_data,function($message)use($mail_data){
                    $message->to($mail_data['fromEmail'])
                            ->from($mail_data['recipient'])
                            ->subject($mail_data['subject'])
                            ->attach(public_path('upload/'.$mail_data['piecejoint']));
                });
            }
        }
    }
            return redirect()->back()->with('success2', 'Email send successfully');
       
        // }else{
        //     return redirect()->back()->withInput()->with('error','Check your internet connection');
        // }
    }
    }



    public function isOnline($site="https://youtube.com/"){
        if (@fopen($site,'r')) {

            return true;
        }else{
            return false;
        }
    }

    public function sendMailindiv($id) {
    
        $contact = Contact::find($id);
        //dd($contact);
        return view('sendMailIndivdirect',['contact'=>$contact]);
    }

    public function sendmailchedek($id){

         $list=explode(',',$id);

        // dd($list);
        $data=[
            'id'=>$id,
            'nombre'=>count($list),
        ];
        return view("checkedSend",$data);
    }

    public function sendmailchedekstore(Request $request){
      $tab=array_filter(explode(',',request('email')));
        //dd($tab);
        $piece="";
        try {
            $path='/upload';
        $newname=Helper::renameFile($path,$request->file('piecejoint')->getClientOriginalName());
        $upload=$request->piecejoint->move(public_path($path),$newname);
        $piece=$request->file('piecejoint')->getClientOriginalName();
        } catch (\Throwable $th) {
           
        }

        foreach($tab as $tab){
        $contact = DB::table('contacts')
        ->where('id', '=', $tab)
        ->select('contacts.*')
        ->get();

      // dd($contact);

        
        if ($this->isOnline()) {

            for ($i=0; $i <count($contact) ; $i++) { 
              // dd($contact[$i]);
          
            
            $mail_data=[
                'recipient'=>'utilisateurp2021@gmail.com',
                'fromEmail'=>$contact[$i]->email,
                'formName'=>$contact[$i]->lastName,
                'subject'=>$request->subject,
                'body'=>$request->message,
                'piecejoint'=>$piece
            ];
        
            if ($piece==='') {
                Mail::send('email-template',$mail_data,function($message)use($mail_data){
                    $message->to($mail_data['fromEmail'])
                            ->from($mail_data['recipient'])
                            ->subject($mail_data['subject']);
                           
                });
              }else{
                Mail::send('email-template',$mail_data,function($message)use($mail_data){
                    $message->to($mail_data['fromEmail'])
                            ->from($mail_data['recipient'])
                            ->subject($mail_data['subject'])
                            ->attach(public_path('upload/'.$mail_data['piecejoint']));
                });
            }
        }
     }
  return redirect()->back()->with('success', 'Email send successfully');}
    }

}
