# simple-note-taking-app

1. Consept that i have learn
    - set email a index to be uniqued for each user
    - set foren_key on notes to track user
    - the controllers are the things that process a req and fetch data from the db.
    - index.php is similler to main.go file...
    - **$\_POST** give use the info about our post req.
    - html name is equal db col name
    - htmlspecialchars() help to prevent user untruste action like putting js on db
    - client can provide empty data we can use HTML required but by using somthing like curl like
        - **curl -X POST http://localhost:8080/notes/create -d "body:"** - send empty body to db.
    - **strlen()** -> give string length
    - **empty()** -> check is empty or not
    - **trim()** -> remove empty spaces
    - **INF** - infinite type
    - static method can be called without create the instance of an class like const we did before make pure funcs only static method thoese that does depend uppon any 
    - **\__DIR__  .  '/../partials/header.php'** here dir cut prefix and extract the partial path
    - **php -h** - php help
    - **php -t** -> to specify doc root (becase currecntly we can access routes.php file from browser which is a security risk) use this we can specify our public folder and what public can access. like **php -S localhost:8080 -t public**

    - extract(assos array) - php provide this funciton whice extract a assos in a file as key of the assos as var and value of the key is data of the array
