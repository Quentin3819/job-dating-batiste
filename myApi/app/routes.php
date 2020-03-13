<?php
declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use App\Application\Actions\User\UpdateUserAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });



    $app->group('/jobdatings', function (Group $group) {
        $group->get('', function(){});
        $group->post('', function(){});
        $group->get('/{id}', function(){});
        $group->put('/{id}', function(){});
        $group->delete('/{id}', function(){});

        $group->post('/{id}/{student}', function(){});

        $group->get('/{id}/{listName}', function(){});
        $group->put('/{id}/{listName}', function(){});
        $group->delete('/{id}/{listName}', function(){});
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
        $group->put('/{id}', UpdateUserAction::class);
    });
};
