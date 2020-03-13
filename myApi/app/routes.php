<?php
declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use App\Application\Actions\User\UpdateUserAction;


use App\Application\Actions\jobDating\ListJobDatingAction;
use App\Application\Actions\jobDating\ViewJobDatingAction;
use App\Application\Actions\jobDating\UpdateJobDatingAction;
use App\Application\Actions\jobDating\DeleteJobDatingAction;

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
        $group->get('', ListJobDatingAction::class);
        $group->get('/{id}',ViewJobDatingAction::class);
        $group->put('/{id}', UpdateJobDatingAction::class);
        //$group->post('', );
        $group->delete('/{id}',DeleteJobDatingAction::class);

        //$group->post('/{id}/{student}', function(){});

        //$group->get('/{id}/{listName}', function(){});
        //$group->put('/{id}/{listName}', function(){});
        //$group->delete('/{id}/{listName}', function(){});
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
        $group->put('/{id}', UpdateUserAction::class);
    });
};
