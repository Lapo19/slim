<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/controllers/HelloController.php';
require __DIR__ . '/controllers/AlunniController.php';

$app = AppFactory::create();

$app->get('/hello', "HelloController:hello");
$app->get('/hello/{name}', "HelloController:helloName");
$app->get('/json/{name}', "HelloController:json_name");// ritornare un json

$app->get('/alunni', "AlunniController:index");
$app->get('/alunni/{id}', "AlunniController:view");
$app->post('/alunni', "AlunniController:create");
$app->put('/alunni/{id}', "AlunniController:update");
$app->delete('/alunni/{id}', "AlunniController:delete");

/*curl localhost:8080/alunni
curl localhost:8080/alunni/2
curl -X POST localhost:8080/alunni --data '{"nome":"aaa","cognome":"bbb"}' -H "Content-Type', 'application/json"
curl -X PUT localhost:8080/alunni/2 --data '{"nome":"aaa","cognome":"bbb"}' -H "Content-Type', 'application/json"
curl -X DELETE localhost:8080/alunni/3
*/
$app->run();
