[English](#english)
[ພາສາລາວ](#lao)

## <a id="english">About This Project</a>

<p>This Web Application is a University's group project created by using Laravel framework and Vue.js as main frameworks and some others libraries.</p>
<p><b>This Web App has the content in Lao language </b></p>

### Installation
- clone this project then open cmd/terminal inside this project's root folder.
you can use clone by using button Code > Download zip or by running this command:
```
git clone https://github.com/LeoDesu/skucommunity.git
```
- run these commands to install dependencies.
```
composer install
npm install
```
- copy file .env.example as .env and edit "DB_*" section according to your database.(warning: you should create new database just for this web).
- migrate data base
```
php artisan migrate
```
- create storage link
```
php artisan storage:link
```
- start web server in you local machine
```
php artisan serve
```
## <a id="lao">ກ່ຽວກັບໂປຣເຈັກນີ້</a>

<p>ເວັບນີ້ແມ່ນຖືກສ້າງຂຶ້ນເພື່ອເປັນຜົນງານສໍາລັບວຽກກຸ່ມຢູ່ມະຫາວິທະຍາໄລ ເຊິ່ງເວັບນີ້ຖືກສ້າງໂດຍນໍາໃຊ້ Laravel framework ແລະ Vue.js ເປັນ frameworks ຫຼັກໆ ແລະ ຍັງມີ libraries ອື່ນໆອີກເລັກນ້ອຍ.</p>
<p><b>ເນື້ອໃນຂອງເວັບຈະເປັນພາສາລາວ </b></p>

### ການຕິດຕັ້ງ
- ດາວໂຫລດໂປຣເຈັກນີ້ແລ້ວເປີດ cmd/terminal ພາຍໃນ root folder ຂອງໂປຣເຈັກນີ້.
ເຈົ້າສາມາດໂຫຼດໂດຍໃຊ້ປຸ່ມ Code > Download zip ຫຼືວ່າ ດ້ວຍການລັນຄໍາສັ່ງ:
```
git clone https://github.com/LeoDesu/skucommunity.git
```
- ລັນຄໍາສັ່ງລຸ່ມນີ້ເພື່ອຕິດຕັ້ງ dependencies.
```
composer install
npm install
```
- ກັອບປີ້ .env.example ເປັນ .env ແລະແກ້ໄຂໝວດ "DB_*" ໃຫ້ຕົງກັບຖານຂໍ້ມູນຂອງເຈົ້າ.(ຄໍາເຕືອນ: ເຈົ້າຄວນສ້າງຖານຂໍ້ມູນສໍາລັບເວັບນີ້ໂດຍສະເພາະ).
- migrate ຖານຂໍ້ມູນ
```
php artisan migrate
```
- ສ້າງ storage link
```
php artisan storage:link
```
- ເລີ່ມ web server ໃນເຄື່ອງຄອມພິວເຕີ້ຂອງເຈົ້າ
```
php artisan serve
```

## License

[MIT license](https://opensource.org/licenses/MIT).
