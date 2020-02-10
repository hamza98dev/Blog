<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    function addToNewsletter($email) {
        $data['email'] = $email;
        $data['listIds'] = array(10);
        $data['updateEnabled'] = false;
        $dataJson = json_encode($data);
        error_log($dataJson);
        $res = $this->CallListAPI($dataJson);
        error_log('addToNewsletter Function');
        error_log(json_encode($res));
        return $res;
    
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email'
        ]);
      
        // $subscriber = new Subscriber();
        // $subscriber->email = $request->email;
        // $subscriber->save();
     
        $mail=$request->email;
        $res=$this->addToNewsletter($mail);
        if ($res) {
            Toastr::success('You Successfully added to our subscriber list :)','Success');
        
            return redirect()->back();      
        }else{
            Toastr::success('Error While Subscribing to our Newsletter :(','Success');
        
            return redirect()->back();    
        }
     
    }

    function CallListAPI($data) {
        $curl = curl_init();
    
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.sendinblue.com/v3/contacts",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => array(
            "api-key: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",
            "accept: application/json",
            "content-type: application/json"
        ),
        ));
    
        //error_log("{\"email\":\"".$data['email']."\",\"listIds\":[".$data['listIds']."],\"updateEnabled\": false}");
    
        $response = curl_exec($curl);
        $err = curl_error($curl);
    
        curl_close($curl);
    
        if ($err) {
        error_log("cURL Error #:" . $err);
        } else {
    
        error_log('resultat');
        error_log(gettype($response));
        $response = json_decode($response, true);
        error_log(gettype($response));
        if(isset($response['message']) && $response['message'] === 'Contact already exist')
        {
            $res['status'] = false;
            $res['message'] = 'Vous êtes déja enregistré';
            error_log(json_encode($res));
            return $res;
        }
        else if(isset($response['id']))
        {
            $res['status'] = true;
            $res['message'] = 'Vous êtes bien enregistré dans notre Newsletter, vous recevrez prochainement nos actualités';
            error_log(json_encode($res));
            return $res;
        }
    
        }
    }
   
}
