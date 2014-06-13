<?php
    $url = "https://www.train.paytronix.com:1283/rest/12.2.0/enrollment/register.json";    
	$content = json_encode("{
  		"authentication": "b2b",
 		 "client_id": "3FTmkQuXB6q8FoAcy2QHWOd42JAFCO9PREEnj_WHaK",
 		 "client_secret": "654fs@mnx4",
 		 "merchantId": 60019,
 		 "printedCardNumber": 6000201000924804,
 		 "enforceUniqueFields": [
 		   "email"
 		 ],
 		 "setUserFields": {
  		  "style": "typed",
   		 "username": [
  		    "wclarke"
   		 ],
  		  "password": [
  		    "Start123"
  		  ],
  		  "mobilePhone": [
  		    "514-299-1649"
  		  ]
 		 },
 		 "setAccountFields": {
 		   "style": "typed",
 		   "favoriteStore": [
 		     {
            	"code": "01"
 		     }
 		   ]
 		 }
	}");

	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_HEADER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

	$json_response = curl_exec($curl);

	$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

	if ( $status != 201 ) {
   	 die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
	}


	curl_close($curl);

	$response = json_decode($json_response, true);         
	
	/*if($_POST){
        // response hash
        $response = array('type'=>'', 'message'=>'');
 
        try{
            // do some sort of data validations, very simple example below
            $required_fields = array('card', 'fname', 'lname','mobilePhone','username','password');
            foreach($required_fields as $field){
                if(empty($_POST[$field])){
                    throw new Exception('Required field "'.ucfirst($field).'" missing input.');
                }
            }
            
            // let's assume everything is ok, setup successful response
            $response['type'] = 'success';
            $response['message'] = 'Thanks for registering!';
        }catch(Exception $e){
            $response['type'] = 'error';
            $response['message'] = $e->getMessage();
        }
        // now we are ready to turn this hash into JSON
        print json_encode($response);
        exit;
    }*/
?>