admin@gmail.com 
admin
php artisan storage:link

felef@mailinator.com
admin

-composer.lock di hapus.., lalu 

As a temporary fix, try this, it worked for me, in the following file:

vendor/laravel/framework/src/Illuminate/Foundation/PackageManifest.php
Find line 116 and comment it:

$packages = json_decode($this->files->get($path), true);
Add two new lines after the above commented line:

$installed = json_decode($this->files->get($path), true);
$packages = $installed['packages'] ?? $installed;
PHP 7.4
FOLDER VENDOR pake extract yg saya buat zip
