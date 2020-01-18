<?php

namespace App\Http\Controllers;

use App\Email;
use App\Mail\SendEmail;
use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('email.index');
    }

    public function send(){
        $emails = Email::orderBy('created_at', 'desc')->paginate(5);

        return view('email.send', compact('emails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $membres = Member::where('mem_fonction', 'Joueur')->get();
        return view('email.create', compact('membres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ema_titre' => 'required',
            'ema_dateJour' => 'required|date',
            'ema_lieu' => 'required',
            'ema_intro' => 'required',
            'ema_descriptif' => 'required',
            'ema_p' => 'required',
            'ema_salutations' => 'required',

        ]);
        $ema_titre = $request->get('ema_titre');
        $ema_dateJour = $request->get('ema_dateJour');
        $ema_lieu = $request->get('ema_lieu');
        $ema_intro = $request->get('ema_intro');
        $ema_descriptif = $request->get('ema_descriptif');
        $ema_p = $request->get('ema_p');
        $ema_p2 = $request->get('ema_p2');
        $ema_salutations = $request->get('ema_salutations');

        $membres = $request->input('mem_id');
        foreach ($membres as $membre){
            $member = Member::find($membre);
            $ema_membres = $member->mem_email;
            Mail::to($ema_membres)->send(new SendEmail($ema_titre,$ema_p, $ema_dateJour,$ema_lieu,$ema_intro,$ema_descriptif,$ema_p2,$ema_salutations));
            $email = new Email();

            if($ema_p2 == null){
                $email->ema_titre = $ema_titre;
                $email->ema_dateJour = $ema_dateJour;
                $email->ema_lieu = $ema_lieu;
                $email->ema_intro = $ema_intro;
                $email->ema_descriptif = $ema_descriptif;
                $email->ema_p = $ema_p;
                $email->ema_salutations = $ema_p;
                $email->ema_mail = $ema_membres;

            }else{
                $email->ema_titre = $ema_titre;
                $email->ema_dateJour = $ema_dateJour;
                $email->ema_lieu = $ema_lieu;
                $email->ema_intro = $ema_intro;
                $email->ema_descriptif = $ema_descriptif;
                $email->ema_p = $ema_p;
                $email->ema_p2 = $ema_p2;
                $email->ema_salutations = $ema_salutations;
                $email->ema_mail = $ema_membres;

            }
            $email->save();
        }
        return redirect('mail/send');
       // dd($ema_membres);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emails = Email::find($id);
        return view('email.show', compact('emails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
