<?php

namespace App;

use Google\Cloud\Dialogflow\V2\SessionsClient;
use Google\Cloud\Dialogflow\V2\TextInput;
use Google\Cloud\Dialogflow\V2\QueryInput;


class DialogFlowDetectIntent
{

    /**
     * Returns the result of detect intent with texts as inputs.
     * Using the same `session_id` between requests allows continuation
     * of the conversation.
     */
    public static function detectIntent($projectId, $text, $sessionId, $languageCode = 'en-US')
    {
        // new session
        $sessionsClient = new SessionsClient(['credentials' => base_path(env('GOOGLE_APPLICATION_CREDENTIALS'))]);
        $session = $sessionsClient->sessionName($projectId, $sessionId ?: uniqid());

        // query for each string in array
        // create text input
        $textInput = new TextInput();
        $textInput->setText($text);
        $textInput->setLanguageCode($languageCode);

        // create query input
        $queryInput = new QueryInput();
        $queryInput->setText($textInput);

        // get response and relevant info
        $response = $sessionsClient->detectIntent($session, $queryInput);
        $queryResult = $response->getQueryResult();
        $fulfilmentText = $queryResult->getFulfillmentText();
        return $fulfilmentText;
        $sessionsClient->close();
    }
}
