## Wordpress Theme
   - **Wordpress Basic Template hierarchy**  
   - [**Tailwindcss With Gulp**](https://github.com/dev-makassar/Tailwindcss-Starterkit)  
   - **Basic PWA | Progressive Web Apps | include Offline & Cache Management**   
   - [**Audit**](#audit)
   - [**Preview Theme**](#preview-theme)
   - [**Install**](#how-to-add-this-theme-on-your-wordpress-theme)
   - [**For Development**](#for-development)
### Audit
- **Server** _Centos 7 PHP5.6 Apache With Web Server Optimize Software | Provision_ [**Kusanagi**](https://en.kusanagi.tokyo/)
- **First Audit**
![first audit](https://github.com/ri7nz/Mesjid/blob/master/docs/lighthouse-audit-first.png)
- **Second Audit**
![first audit](https://github.com/ri7nz/Mesjid/blob/master/docs/lighthouse-audit-second.png)

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
