![Cat](https://www.telestax.com/wp-content/uploads/2019/05/TelestaxLogo_325px.png)



## Introduction

### Coffee Agent
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

### Banking Agent
This is a banking IVR application powered by Google's machine learning and Ai (DialogFlow) + Restcomm Cloud.

This agent allows your app to help users with self-service banking services.

* Examples: 

User Speech: Balance

User Speech: Check my card balance

User Speech: Transfer $10 from checking to savings

User Speech: What's my checking account balance

User Speech: What's my savings account balance

User Speech: I would like to transfer money


#### Installation
* clone this project:

    ``git clone https://github.com/RestComm/Restcomm-apps.git``

* then install dependencies:

    ``cd dialogflow/``
    
    ``composer install``
#### DialogFlow and Google setup:
* visit dialogflow.com and login to your account
* from the left menu, click on "prebuild Agents" and import the "Coffee Shop" for example agent.
* it will ask you to create a Google project or use an existing one.
* after importing, click on the gear next to the agent name on the left menu.
* click on the service account link, to visit Google console.
* click on the same service account again inside Google console.
* click on Edit, then **Create Key**, choose **JSON** and put the downloaded file in the **root** of this project.

#### Complete installation
* copy the .env file `cp .env.example .env` and open for edit
* set **database** parameters.
* rename the downloaded JSON file to `AGENT_NAME.json` replace AGENT_NAME with the Agent Name that you are using, this will also be the active end point for this Agent `/AGENT_NAME`
* then run `php artisan migrate` to create the database tables.
* and finally create a user with a simple token to call the API using
`php artisan generate:token`

 #### Testing The Setup
 To test the API, use any REST client to make a POST request to the end point `/{AGENT_NAME}`
  for example:
 `/coffee` for Coffee Agent.
 `/banking` for Banking Agent.
 
 with the headers:
 
 `authorization: Bearer YOUR_GENERATED_TOKEN_HERE`
 
 `content-type: application/json`
 
 and  the body
 
 {"sms":"Hello"}
 
if everything is setup correctly you should get a response like this one


``{
  "response": "Good day! I have a lot coffee and snacks. What can I get you to drink?"
  }``
  
 #### Restcomm (RVD) Setup Guide 
  
Check out our blog post for detailed setup at https://www.restcomm.com/restcomm-and-google-dialogflow-ai-in-action/
