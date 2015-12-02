# callb - Callback

![callb-frontend](https://www.webasyst.com/wa-data/public/updates/img/86/1486/4848/4848.970.png)

![callb-settings](https://www.webasyst.com/wa-data/public/updates/img/86/1486/4847/4847.970.png)

## Description
Callback plugin for Shop-Script 6

## Features
Shop customers can request a callback by entering name and phone number. Also they can enter comment.

Then request sends to the administrator email, which specified in the plugin settings. If the email address is not specified in settings, will be used the general shop email.

Administrator can view requests in a separate tab of the admin panel and edit the form's appearance: size, text, color. All changes are dynamically displayed in the form preview in live-mode. There is input mask for the phone that allows you to set a specific number pattern.

## Installing
### Auto
Install plugin from webasyst store: [Callback-en](https://www.webasyst.com/store/plugin/shop/callb/) or [Callback-ru](https://www.webasyst.ru/store/plugin/shop/callb/).  
Or you can install plugin from Installer app in backend.

### Manual
1. Get the code into your web server's folder /PATH_TO_WEBASYST/wa-apps/shop/plugins

2. Add the next line into the /PATH_TO_WEBASYST/wa-config/apps/shop/plugins.php file (this file lists all installed shop plugins):

		'callb' => true,

3. Done. Configure the plugin in the plugins settings tab of shop backend.

## Settings
1. To use the plugin in the Shop app switch on «Status of frontend_head hook» plugin setting and scripts are automatically loaded in your template.

2. To use the plugin in other apps it is necessary switch off «Status of frontend_head hook» plugin setting and insert in the template of your application to the end of the tag <head> the next code:  
**{if $wa->shop}{shopCallbPlugin::display()}{/if}**

3. To bind the form to the html-element in the template, you must either create a new or use an existing one.
For example, you have the template has the next element:  
*&lt;a href="#" id="call-back-button"&gt;Callback&lt;a&gt;*  
Specify in the «Selector of the button of callback form» plugin setting the next - **#call-back-button** - and after clicking on this item will open the callback form.

You can specify the sender email address (will be listed as the return address of the message) and the recipient email (to which to send messages).

## Specificity
If you switch on «Status of frontend_head hook» setting, for the correct operation of the plugin in the current design theme needs to be connected **frontend_head** hook.