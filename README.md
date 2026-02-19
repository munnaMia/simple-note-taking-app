# simple-note-taking-app

1. Consept that i have learn
    - set email a index to be uniqued for each user
    - set foren_key on notes to track user
    - the controllers are the things that process a req and fetch data from the db.
    - **index.php** is similler to main.go file...
    - **$\_POST** give use the info about our post req.
    - **html name attribute** is equal db col name
    - **htmlspecialchars()** help to prevent user untruste action like putting js on db
    - client can provide empty data we can use HTML required but by using somthing like curl like
        - **curl -X POST http://localhost:8080/notes/create -d "body:"** - send empty body to db.
    - **strlen()** -> give string length
    - **empty()** -> check is empty or not
    - **trim()** -> remove empty spaces
    - **INF** - infinite type
    - **static method** can be called without create the instance of an class like const we did before make pure funcs only static method thoese that does depend uppon any
    - **\_\_DIR\_\_ . '/../partials/header.php'**
        - here dir cut prefix and extract the partial path **DIR**:
        - This is a magic constant that always points to the directory where the current file (index.php) lives. In your case, that is /home/munna/.../public/.
        - ..: This tells the operating system to "go up one level."
        - Result: Even though the web server is serving from the public folder, the PHP script has full permission to reach "up and out" to the parent directory to find Database.php

    - **php -h** - php help
    - **php -t** -> to specify doc root (becase currecntly we can access routes.php file from browser which is a security risk) use this we can specify our public folder and what public can access. like **php -S localhost:8080 -t public**
    - **extract(assos_array)** - php provide this funciton whice extract a assos in a file as key of the assos as var and value of the key is data of the array
## **namespace Name** -> In PHP, a namespace is used to organize code and avoid name conflicts. It helps you group related classes, functions, and constants under a unique name.
```php
class User {
    public function getName() {
        return "User A";
    }
}

class User {
    public function getName() {
        return "User B";
    }
}
# ❌ This will cause a fatal error:

#Cannot declare class User, because the name is already in use.
```
```php
namespace App\Models;

class User {
    public function getName() {
        return "App User";
    }
}

// can be use like
$user = new App\Models\User();

```
```php
namespace Admin\Models;

class User {
    public function getName() {
        return "Admin User";
    }
}

// can be use like 
use App\Models\User;

$user = new User();

```


## **spl_autoload_register**
```php
spl_autoload_register(function ($class) {
    require   base_path($class . '.php');
});


// this fn take a call back fn and it automaticall triggerd by php

// so our database class implement but if not require php try to find the cause class by this
// How It Works
// Think of it as a "safety net." When you write $user = new User(); and PHP realizes it doesn't know what a User class is, it doesn't crash immediately. Instead, it looks at the functions you've registered via spl_autoload_register() and asks them, "Hey, can you find this class for me?"
```

   
