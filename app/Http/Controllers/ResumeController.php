<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Language;
use App\Models\User;
use App\Models\Design;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;


//use PDF;


class ResumeController extends Controller
{
    //
    /*public function index()
    {
        

        return view('resume');
       // return view('resume-ref', compact('user'));
        // return view('resume2', compact('user'));
    }
    public function download()
    {
        $user = auth()->user();

        $pdf = \PDF::loadView('resume-ref', compact('user'));
        return $pdf->download('resume.pdf');
    }
    
    */

   /*public function download($id)
    {
        $profile = Profile::findOrFail($id);

        $pdf = \PDF::loadView('resume', compact('profile'))->setPaper('a4', 'portrait');
        return $pdf->download('resume.pdf');
    }*/
 
        public function script()
        {
        
         //delete expired records older than 7 days from Frontend
         $date  = Carbon::now();
         $profiles = Profile::where('expires_at', '<', $date )->get();
         
            foreach($profiles as $prof){
                $bild=$prof->profileimg;           
                //Storage::move( "public/{$bild}", "public/new/{$bild}/");
                Storage::delete( "public/{$bild}/");  
                $user_pr=$prof->user_id;            
                User::where('id','=', $user_pr )->delete();
             }
                //delete records older than 7 days from BackEnd
            $date  = Carbon::now()->subDays(7);
            User::where([
                ['created_at','<=', $date],
                ['is_admin','=', '0'],
            ])->delete();
          

            //delete photos older than 7 Days without Data Base conection
            $files = collect( Storage::files("public"));
            $files->each (function ($file) {
                $lastModified = Storage::lastModified($file);
                $lastModified = Carbon::parse($lastModified);

                if (Carbon::now()->gt($lastModified->addDays(7))) {
                    Storage::delete($file);
                }
            }   ); 
            echo('Done');
        }
   
      

        // ->delete();        

      /*
        //delete records older than 1 hour
            $date  = Carbon::now()->subMinutes( 60 );
            Profile::where('created_at',  '<=', $date )->delete();
            Education::where('created_at',  '<=', $date )->delete();
            Experience::where('created_at',  '<=', $date )->delete();
            Language::where('created_at', '<=', $date )->delete();    

            //delete photos older than 1 hour
            $files = collect( Storage::files("public"));
            $files->each(function ($file) {
                $lastModified = Storage::lastModified($file);
                $lastModified = Carbon::parse($lastModified);

                if (Carbon::now()->gt($lastModified->addHour(1))) {
                    Storage::delete($file);
                }
            }
      */

      

        public function preview($name) {
        if (Auth::check())
        {
        $user = auth()->user();
        $profile=Profile::where(array('user_id' => $user->id))->first();
        $profileid=$profile->id;
       
        $educations=Education::orderBy('sort', 'ASC')->where('profile_id', $profileid)->get();
        $experiences=Experience::orderBy('sort', 'ASC')->where('profile_id', $profileid)->get();
        $languages=Language::where('profile_id', $profileid)->get();
        $timestamp = time();
        $datum = date("d.m.Y", $timestamp);
        
        return view($name)->with('profile', $profile)->with('experiences', $experiences)->with('educations', $educations)->with('languages', $languages)->with('datum', $datum);
        }else{
            return redirect()->to('/');
        }
     
    }
    public function herunteladen($name) {
        if (Auth::check())
        {
        $user = auth()->user();
        $profile=Profile::where(array('user_id' => $user->id))->first();
        $profileid=$profile->id;
        $educations=Education::orderBy('sort', 'ASC')->where('profile_id', $profileid)->get();
        $experiences=Experience::orderBy('sort', 'ASC')->where('profile_id', $profileid)->get();
        $languages=Language::where('profile_id', $profileid)->get();      
        $timestamp = time();
        $datum = date("d.m.Y", $timestamp);
  

        $pdf = \App::make('dompdf.wrapper');  
      
        Pdf::setOption(['isRemoteEnabled' => true, 'isHtml5ParserEnabled' => true, 'chroot' => '/public/storage/']);
        
        $pdf->getDomPDF()->setBasePath('/public/storage/')->set_option('enable_remote', TRUE);
        
        //$pdf = Pdf::loadView('resume', $data);    
           // Render the HTML as PDF
           $pdf = PDF::loadView($name, ['profile' => $profile,
           'educations'=>$educations,
           'experiences'=>$experiences,
           'languages'=>$languages,
           'datum' => $datum])->setOptions(['defaultFont' => 'sans-serif']);
            #$pdf->setOption('logOutputFile', '/var/www/virtual/lebenslauf.stimme.de/storage/hauser.log');
            #$pdf->setOption('debugPng', TRUE);
            $pdf->setOption('isRemoteEnabled', TRUE);
            $pdf->setOption('isHtml5ParserEnabled', TRUE);
            $httpContext = array (
                    'curl' => array (
            'curl_verify_ssl_host'=>false
                        )
                    );
            #$pdf->getDomPDF()->setHttpContext($httpContext);


        
        // Output the generated PDF to Browser
        return $pdf->stream(); // screenshot #2
        }else{
        return redirect()->to('/');
        }
    
      }

   

    
}
