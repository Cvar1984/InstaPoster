# InstaPoster
InstaPoster is a Simpe Instagram API Client.

  - Simple to use
  - Easy to development
  - Support PHP5

### New Features!

  - None


You can also:
  - Run from mobile device like Android
  - Run from Linux/UNIX or Windows

### Installation

requires [php](https://php.net ) >= 5 to run.

Install the dependencies and software.

```sh
$ sudo apt install php php-curl wget
$ sudo wget https://raw.githubusercontent.com/Cvar1984/InstaPoster/master/build/main.phar -O /usr/local/bin/instaposter
```

For Android Termux environments

```sh
$ apt install php php-curl wget
$ wget https://raw.githubusercontent.com/Cvar1984/InstaPoster/master/build/main.phar -O $PREFIX/bin/instaposter
```
### Exaxmple usage
```php
// from root directory
require 'src/class.php';
 $test=new InstagramUpload();
 $test->Login($username,$password);
 $test->UploadPhoto($path,"$caption");
```

### Todo

 - Multi Threads

License
----

MIT

**Free Software, Hell Yeah!**
