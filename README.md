# Magento 2 Extention Whats App Contact
**Whatsapp Extension Magento extension** (Magepow Whatsapp Contact Extension) WhatsApp is a widely used messaging app, easy to use, and is the best choice for instant communication. WhatsApp Contact for Magento 2 lets the visitors instantly contact the store admin by clicking the WhatsApp contact button kept on the site.
## 1. How to install Magento 2 Whatsapp Contact
### ✓ Install Magiccart Whatsapp Contact via composer (recommend)
Run the following command in Magento 2 root folder:

```
composer require magiccart/whatsappcontact
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy -f
```

## 2. Look in Frontend
### Look in frontend button type icon
![widget-img](https://github.com/magepow/magento-2-whats-app-contact/blob/master/media/frontend_button_type_icon.png)
### Look in frontend button type chat box
![widget-img](https://github.com/magepow/magento-2-whats-app-contact/blob/master/media/frontend_button_type_chatbox.png)
## 3. Highlight Features
- Easy to Enable/Disable module anytime
- Use Magento 2 WhatsApp Contact extension by MageComp to let your customers quickly connect with you just with a single button click.
- Enable WhatsApp Contact for only mobile devices if needed.
- Change WhatsApp icon, position, color, text.
- Onclick, customer will be redirected to WhatsApp web/app respectively.
- Button type chat box can choose to chat with the manager. 
## Step 4: User guide
  ### 4.1. General configuration

  `Login to Magento admin > Stores > Configuration > Magepow > WhatsApp Contact > Configuration > Enable > Choose Yes to enable the module.`
  Or `Login to Magento admin > Magepow > Configuration.`
  #### Type Icon config
  ![Image of Magento admin config](https://github.com/magepow/magento-2-whats-app-contact/blob/master/media/backend_config.png)
  #### Type chat box config
  ![Image of Magento admin config](https://github.com/magepow/magento-2-whats-app-contact/blob/master/media/backend_config_chatbox.png)
   In Admin we set: 
   * **Button Type**: Choose type chat default is number config on contact mobile number or whatsapp agents person.
   * **Button Text**: When choose button type will display text button on front end.
   * **Enable WhatsApp Contact Type**: Select mode shows with Only mobile, only desktop and Desktop/Mobile.
   * **Default Chat Message**: Default message when contact WhatsApp.
   * **Button Background Color**: Background button whatsapp contact ddefault is #09e343.
   * **Icon Color**: Text color default is #ffffff.
   * **Text on popup**: Text on popup WhatsApp contact agents person.
   * **Button Display From**: Show WhatsApp contact by time config.
   * **Button Display To**: Show WhatsApp contact by time config.
   * **Top Position**: Using pixels. Position display whatsapp show Top if want.
   * **Right Position**: Using pixels. Position display whatsapp show right if want Default config is 25px.
   * **Bottom Position**: Using pixels. Position display whatsapp show botton if want Default config is 25px.
   * **Left Position**: Using pixels. Position display whatsapp show left if want.
   * **Close Button**: Enabled is shows x close icon and button whatsapp.
   ### 4.2 Manage WhatsApp chat
   To create manager whats app on Button type chatbox.
   `Login to Magento admin > Magepow > Manage WhatsApp Chat > Add New.`
   ![Image of Magento admin config](https://github.com/magepow/magento-2-whats-app-contact/blob/master/media/form_manager.png)
   * **Name**: Name of Manager whatsApp.
   * **Department Name**: Department name of manager whatsApp Contact.
   * **Mobile Number**: Enter number with country code. (+1) for United States.
   * **Default Message**: Text default will auto-send when the customer clicks WhatsApp contact.
   * **Photo**: Allow image type: jpg, jpeg, gif, png
   * **Status**: choose active or inactive.
   After you finish configuring, save and clear the cache.
   Run the following command:
   
   ```
   php bin/magento cache:clean
   ```
## Donation

If this project help you reduce time to develop, you can give me a cup of coffee :) 

[![paypal](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://www.paypal.com/paypalme/alopay)


**Free Extensions List**

* [Magento 2 Recent Sales Notification](https://magepow.com/magento-2-recent-sales-notification.html)

* [Magento Categories Extension](https://magepow.com/magento-categories-extension.html)

* [Magento Sticky Cart](https://magepow.com/magento-sticky-cart.html)

* [Magento Ajax Contact](https://magepow.com/magento-ajax-contact-form.html)

* [Magento Lazy Load](https://magepow.com/magento-lazy-load.html)


**Premium Extensions List**

* [Magento Speed Optimizer](https://magepow.com/magento-speed-optimizer.html)

* [Magento 2 Mutil Translate](https://magepow.com/magento-multi-translate.html)

* [Magento 2 Instagram Integration](https://magepow.com/magento-2-instagram.html)

* [Lookbook Pin Products](https://magepow.com/lookbook-pin-products.html)

* [Magento Product Slider](https://magepow.com/magento-product-slider.html)

* [Magento Product Banner](https://magepow.com/magento-banner-slider.html)


**Featured Magento Themes**

* [Expert Multipurpose responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/expert-premium-responsive-magento-2-and-1-support-rtl-magento-2-/21667789)

* [Gecko Premium responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/gecko-responsive-magento-2-theme-rtl-supported/24677410)

* [Milano Fashion responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/milano-fashion-responsive-magento-1-2-theme/12141971)

* [Electro responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/electro-responsive-magento-1-2-theme/17042067)

* [Pizzaro food responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/pizzaro-food-responsive-magento-1-2-theme/19438157)

* [Biolife organic responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/biolife-organic-food-magento-2-theme-rtl-supported/25712510)

* [Market responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/market-responsive-magento-2-theme/22997928)

* [Kuteshop responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/kuteshop-multipurpose-responsive-magento-1-2-theme/12985435)


**Featured Magento Services**

* [PSD to Magento 2 Theme Conversion](https://magepow.com/psd-to-magento-theme-conversion.html)

* [Magento Speed Optimization Service](https://magepow.com/magento-speed-optimization-service.html)

* [Magento Security Patch Installation](https://magepow.com/magento-security-patch-installation.html)

* [Magento Website Maintenance Service](https://magepow.com/website-maintenance-service.html)

* [Magento Professional Installation Service](https://magepow.com/professional-installation-service.html)

* [Magento Upgrade Service](https://magepow.com/magento-upgrade-service.html)

* [Customization Service](https://magepow.com/customization-service.html)

* [Hire Magento Developer](https://magepow.com/hire-magento-developer.html)


[![Latest Stable Version](https://poser.pugx.org/magepow/whatsappcontact/v/stable)](https://packagist.org/packages/magepow/whatsappcontact)
[![Total Downloads](https://poser.pugx.org/magepow/whatsappcontact/downloads)](https://packagist.org/packages/magepow/whatsappcontact)

**[Our Shopify Themes](https://themeforest.net/user/alotheme)**

* [Dukamarket - Multipurpose Shopify Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/dukamarket-multipurpose-shopify-theme/36158349)

* [Ohey - Multipurpose Shopify Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/ohey-multipurpose-shopify-theme/34624195)

* [Flexon - Multipurpose Shopify Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/flexon-multipurpose-shopify-theme/33461048)

**[Our Shopify App](https://apps.shopify.com/partners/maggicart)**

* [Magepow Size Chart](https://apps.shopify.com/magepow-size-chart)

**[Our WordPress Theme](https://themeforest.net/user/alotheme/portfolio)**

* [SadesMarket - Multipurpose WordPress Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/sadesmarket-multipurpose-wordpress-theme/35369933)