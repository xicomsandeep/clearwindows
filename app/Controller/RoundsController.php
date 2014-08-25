<?php
App::uses('AppController', 'Controller');
/**
 * Customers Controller
 *
 * @property Customer $Customer
 */
 define("GOOGLE_API_KEY", "AIzaSyAVUPHqVkn8-SZIyF6GJGFQrfmBpBujZqs");
class RoundsController extends AppController {

	/**
	 * Purpose:add customer information
	 * created on:2 july 2014
	 * created by:Abhishek Tripathi
	 */
	public function add() {
		if ($this -> request -> is('Post')) {
			//debug($this->request->data);exit;
			if ($this -> Round -> save($this -> request -> data)) {

				$res = response_arr('Successfully added', 0, $this -> request -> data);
				echo json_encode($res);
				exit ;
			}
		}
	}

	/**
	 * Purpose:job list in a round
	 * created on:28 july 2014
	 * created by:Abhishek Tripathi
	 */

	public function round_in_job() {
		$rounds = array();
		$this -> Round -> recursive = 1;
		$round_list = $this -> Round -> find('all');
		foreach ($round_list as $round) {
			$rounds[] = array('name' => $round['Round']['name'], 'count' => count($round['Job']));
		}

		$res = response_arr('Successfully added', 0, $rounds);
		echo json_encode($res);
		exit ;
	}

	public function iphone_pushNotification() {
		//debug( WWW_ROOT.'ck.pem');exit;
		$message="dfsdf";
		$deviceToken = 'd3713022b45bc28abef3fbd473fecdc8fa6474910940e1be95e6bd838c12caef';

        $key_path = WWW_ROOT . DS . 'ck.pem';
				$ctx = stream_context_create();
		        stream_context_set_option($ctx, 'ssl', 'local_cert', $key_path);
		  stream_context_set_option($ctx, 'ssl', 'passphrase', 'technologies');

		$fp = stream_socket_client('ssl://gateway.sandbox.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx);

		//if (!$fp)
		//exit("Failed to connect amarnew: $err $errstr" . PHP_EOL);

		//echo 'Connected to APNS' . PHP_EOL;

		// Create the payload body
		//$body['aps'] = array('badge' =>  1, 'alert' => $message, 'sound' => 'default', 'content-available'=>'1',);
        $message = 'dasdas';
         $body['aps'] = array(
                    'alert'         => $message,
                    'badge'     => 1,
                    'sound'     => 'default',
                 );
		
		
		         $payload = json_encode($body);
				/// debug($payload);exit;
            // Build the binary notification
                $deviceToken = str_replace(' ', '', $deviceToken);
				try{
					$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
	                
			    // Send it to the server
	                $result = fwrite($fp, $msg, strlen($msg));
	                if (!$result)
	                {
		                echo '<br>'.date("Y-m-d H:i:s").' Message not delivered' . PHP_EOL;  
	                } else
	                {
		                echo '<br>'.date("Y-m-d H:i:s").' Message successfully delivered' . PHP_EOL;
	                }
				} catch(Exception $eee)
				{
					$this->log('Message Push - ' . $eee);
				}
				fclose($fp);
            echo '<br>'.date("Y-m-d H:i:s").' Connection closed to APNS' . PHP_EOL;
	}

	public function test() {
		//$array_toke[]= '24c4397a6313c50171cc13350595597ceb80596674bd2708904f8361bace684a';
		$array_toke[]= 'd3713022b45bc28abef3fbd473fecdc8fa6474910940e1be95e6bd838c12caef';
		
		$message = 'Welcome';
		$as = $this -> iphone_pushNotification($array_toke, $message);
		echo $as;
		exit ;
	}
	
	
	
	 public function send_notification()
    {
    	
    	$devices = array('24c4397a6313c50171cc13350595597ceb80596674bd2708904f8361bace684a');
		if(!empty($devices))
		{
			
			foreach($devices as $deviceToken)
			{
				if(!$deviceToken)
				{
					continue;
				}
				$key_path = WWW_ROOT . DS . 'ck.pem';
				$ctx = stream_context_create();
		        stream_context_set_option($ctx, 'ssl', 'local_cert', $key_path);
		        stream_context_set_option($ctx, 'ssl', 'passphrase', 'technologies');
		        // Open a connection to the APNS server
		        $fp = stream_socket_client(
	            'ssl://gateway.sandbox.push.apple.com:2195', $err,
	            $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
                $message = 'dasdas';
				debug($fp);
            // Create the payload body
                $body['aps'] = array(
                    'alert'         => $message,
                    'badge'     => 1,
                    'sound'     => 'default',
                 );
            // Encode the payload as JSON
	            $payload = json_encode($body);
				//debug($payload);exit;
            // Build the binary notification
                $deviceToken = str_replace(' ', '', $deviceToken);
				try{
					$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
					debug($payload);
	            // Send it to the server
	                $result = fwrite($fp, $msg, strlen($msg));
	                if (!$result)
	                {
		                echo '<br>'.date("Y-m-d H:i:s").' Message not delivered' . PHP_EOL;  
	                } else
	                {
		                echo '<br>'.date("Y-m-d H:i:s").' Message successfully delivered' . PHP_EOL;
	                }
				} catch(Exception $eee)
				{
					$this->log('Message Push - ' . $eee);
				}
				fclose($fp);
            echo '<br>'.date("Y-m-d H:i:s").' Connection closed to APNS' . PHP_EOL;
            }
            // Close the connection to the server
        } else
        {
            echo '<br>'.date("Y-m-d H:i:s").' Queue is empty!';
        }
    }

   	
	/**
	 * Description : function will send push notification on device
	 * return @mixed
	 * Author  : Mukesh Soni
	 * Created : Dec 17, 2013
	 */
	 
	public function sendToAndroid()
	{
		
		 $registatoin_ids = array('APA91bHZUfwvRnJ7K6R4DJTq94ZwZyQtEZpSGN5QPMAJCmXoj1obEyJN5WutCi3mRteSFRN9CoFe_TmIaeN7LHJ5dbZXTkJ_2XCGyejsLqt0ANPcEBr3whVsDHgc-YFu7Ix0UOxvZm91cI-SIIMmQvviS2PpYqmDdg');
    $message = array("product" => "shirt");
		 // include config
       // include_once './config.php';

        // Set POST variables
        $url = 'https://android.googleapis.com/gcm/send';
 
        $fields = array(
            'registration_ids' => $registatoin_ids,
            'data' => $message,
        );
      $key='AIzaSyDUqPk9N-mx5U18XqS4_jX416O5fTA_avg';
        $headers = array(
            'Authorization: key=' . GOOGLE_API_KEY,
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();
 
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
 
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
 
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
 
        // Close connection
        curl_close($ch);
        echo $result;
	}
	


}
