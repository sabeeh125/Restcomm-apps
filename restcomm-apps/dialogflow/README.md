## Introduction

This is a coffee ordering SMS application powered by Google's machine learning and Ai + Restcomm Cloud.

This agent allows your app to help users with order coffee drinks, snacks, and other merchandise from a coffee shop service. 

* Examples: 

User: I’d like a coffee to go. 
User: Can I get a small iced latte with low fat milk? 
User: Two medium cappuccinos please.  
User: Can I get three doughnuts please? 
User: I’d love to get a bagel with cream cheese. 
User: I’m hungry. 
User: I would like to order a gift card with $50 on it. 
User: I’m looking for a present.


#### Project Installation
* clone this project:

    ``git clone https://github.com/ajamous/DialogFlow_Restcomm.git``

* then install dependencies:

    ``cd DialogFlow_Restcomm/``
    
    ``composer install``
#### DialogFlow and Google setup:
* visit dialogflow.com and login to your account
* from the left menu, click on "prebuild Agents" and import the "Coffee Shop" agent.
* it will ask you to create a Google project or use an existing one.
* after importing, click on the gear next to the agent name on the left menu.
* click on the service account link, to visit Google console.
* click on the same service account again inside Google console.
* click on Edit, then **Create Key**, choose **JSON** and put the downloaded file in the **root** of this project.

#### Complete installation
* copy the .env file `cp .env.example .env` and open for edit
* set **database** parameters.
* set the `GOOGLE_APPLICATION_CREDENTIALS` parameter to be the name of the downloaded JSON file.
* set the `PROJECT_ID parameter` to the created project ID.
* then run `php artisan migrate` to create the database tables.
* and finally create a user with a simple token to call the API using
`php artisan generate:token`

 #### Testing The Setup
 to test the API, use any REST client to make a POST request to the end point 
 `/sms`
 with the headers:
 
 `authorization: Bearer YOUR_GENERATED_TOKEN_HERE`
 
 `content-type: application/json`
 
 and  the body
 
 {"sms":"Hello"}
 
if everything is setup correctly you should get a response like this one


``{
  "response": "Good day! I have a lot coffee and snacks. What can I get you to drink?"
  }``
  
 #### Restcomm Setup 
  
Step by step guide coming soon. 
