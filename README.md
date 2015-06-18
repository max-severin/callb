# callb

## Description
Callback plugin for Shop-Script 6

## Features
Shop customers can request a callback by entering name and phone number.

Then request sends to the administrator email, which specified in the plugin settings. If the email address is not specified in settings, will be used the general shop email.

Administrator can view the requests in a separate tab in the admin panel and edit the form's appearance: size, text, color. All changes are dynamically displayed in the form preview in live-mode.

## Installing
### Auto
...

### Manual
1. Get the code into your web server's folder /PATH_TO_WEBASYST/wa-apps/shop/plugins

2. Add the following line into the /PATH_TO_WEBASYST/wa-config/apps/shop/plugins.php file (this file lists all installed shop plugins):

		'callb' => true,

3. Done. Configure the plugin in the plugins settings tab of shop backend.

## Settings
After plugin install, you need to select or create a hyperlink or other html-element in the theme template, when clicking on which will open a window with the form callback, and then set to element attribute identifier (id) or class (class). This element examples:  
*&lt;a id="call-back-button"&gt;Callback&lt;/a&gt;*  
Or:  
*&lt;a class="call-back-button"&gt;Callback&lt;/a&gt;*

In the plugin settings:
- You must specify a selector of the element of callback form (id or class of the html-element of theme template), when clicking on which will open a form of callback.  
Must be like «**#call-back-button**» or «**.call-back-button**».
- You can specify the sender email address (will be listed as the return address of the message) and the recipient email (to which to send messages).

## Specificity
For the correct operation of the plugin in the current design theme needs to be connected **frontend_head** hook