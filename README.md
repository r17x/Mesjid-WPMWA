## Wordpress Theme
   - Wordpress Basic Template hierarchy
   - Tailwindcss With Gulp
   - Basic PWA (Progressive Web Apps)
   - [Preview Theme](https://github.com/ri7nz/Mesjid#preview-theme)
   - [Install](https://github.com/ri7nz/Mesjid#how-to-add-this-theme-on-your-wordpress-theme)
   - [For Development](https://github.com/ri7nz/Mesjid#for-development)
### Preview Theme
- Laptop Screen
![Laptop](https://github.com/ri7nz/Mesjid/blob/master/docs/laptop.png)
- Phone Landscape Screen
![Phone Landscape](https://github.com/ri7nz/Mesjid/blob/master/docs/phone-landscape.png)
- Phone Potrait Screen
![Phone Potrait](https://github.com/ri7nz/Mesjid/blob/master/docs/phone-SamsungS5.png)

#### How to implement tailwindcss into Wordpress Theme/Template
- Coming soon !
#### How To Add This Theme On Your Wordpress Theme
- Clone & Setup   
```sh
$ cd your_wordpress_project
$(your_wordpress_project) cd wp-content/themes && git clone https://github.com/ri7nz/Mesjid.git
```
   
- Go To Dashboard(wp-admin) -> apperance -> themes -> find Mesjid & Activate   
#### For Development 
```sh 
$ cd your_wordpress_project/wp-content/themes/Mesjid
# required NPM (Node Package Manage)
$ (mesjid) npm install
$ gulp style # compile scss with tailwindcss
$ gulp # if you still coding UI
```
