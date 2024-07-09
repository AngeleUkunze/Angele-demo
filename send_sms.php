<?php 
use Infobip\Configuration;
use Infobip\Api\SmsApi;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
use Infobip\Model\SmsAdvancedTextualRequest;

// Include the Composer autoloader
require __DIR__."/vendor/autoload.php";

// Your Infobip API credentials
$apiURL = "y3j9p9.api.infobip.com"; // Replace with your Infobip API URL
$apiKey = "72ff13eb5b2411b270d58df3351d4955-d53d8e78-be05-43cc-bcaa-a7f17d84d228"; // Replace with your Infobip API key

// Initialize Infobip configuration
$configuration = new Configuration($apiURL, $apiKey);
$api = new SmsApi($configuration);

// Default recipient's phone number and message
$defaultRecipient = "+250789633606"; // Replace with your default recipient's phone number
$defaultMessage = "Hello from Agakaye Kumucuruzi!"; // Replace with your default message

// Recipient's phone number and message from form submission
$to = isset($_POST['phonenumber']) ? $_POST['phonenumber'] : $defaultRecipient; // Use the provided phone number or the default one if not provided
$message = isset($_POST['message']) ? $_POST['message'] : $defaultMessage; // Use the provided message or the default one if not provided

// Check if message is empty
if (empty($message)) {
    echo "Error: Message is empty";
    exit;
}

// Create a destination object
$destination = new SmsDestination($to);

// Create a textual message object
$theMessage = new SmsTextualMessage([$destination], $message);

// Create a request object
$request = new SmsAdvancedTextualRequest([$theMessage]);

// Send the SMS message
try {
    $response = $api->sendSmsMessage($request);
    echo "SMS Sent";
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
