<?php
namespace App\Firebase;
/**
 * @author Ravi Tamada
 * @link URL Tutorial link
 */
class Firebase {

    // Sending push message to single user or topics
    public function sendAll($message, $to = '/topics/global'){
        $fields = array(
            'to' => $to,
            'data' => $message,
        );
        return $this->sendPushNotification($fields);
    }

    // sending push message to single user by firebase reg id
    public function send($to, $message) {
        $fields = array(
            'to' => $to,
            'data' => $message,
        );
        return $this->sendPushNotification($fields);
    }

    // Sending message to a topic by topic name
    public function sendToTopic($to, $message) {
        $fields = array(
            'to' => '/topics/' . $to,
            'data' => $message,
        );
        return $this->sendPushNotification($fields);
    }

    // sending push message to multiple users by firebase registration ids
    public function sendMultiple($registration_ids, $message) {
        $fields = array(
            'to' => $registration_ids,
            'data' => $message,
        );

        return $this->sendPushNotification($fields);
    }

    // function makes curl request to firebase servers
    private function sendPushNotification($fields) {
        
        // define('FIREBASE_API_KEY', 'AAAA3txv8OM:APA91bFgU71E3Fo37j_Sj5lsvFtJ1Lw1XgU3oXPfbtjwCS5x1WSlg0jAg1xIaaM_ocmoYY10xuOO3gOoLsl0FWHfljbJiVV8kHTtibR9h5sXQz0x_pMK1rOJA0fU0h2ovvx6W1dcw9BF');

        // Set POST variables
        $url = 'https://fcm.googleapis.com/fcm/send';

        $headers = array(
            'Authorization: key= AAAA3txv8OM:APA91bFgU71E3Fo37j_Sj5lsvFtJ1Lw1XgU3oXPfbtjwCS5x1WSlg0jAg1xIaaM_ocmoYY10xuOO3gOoLsl0FWHfljbJiVV8kHTtibR9h5sXQz0x_pMK1rOJA0fU0h2ovvx6W1dcw9BF',
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

        return $result;
    }
}

?>