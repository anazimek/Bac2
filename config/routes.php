<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);
    $routes->connect('/infos', ['controller' => 'Pages', 'action' => 'infos']);
    $routes->connect('/nous-contacter', ['controller' => 'Contact', 'action' => 'index']);
    $routes->connect('/blog', ['controller' => 'BlogArticles', 'action' => 'index']);
    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks(DashedRoute::class);
});

/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();

//---------------------------------------------------------------------------------------------------------DEBUT ROUTES D'ADMIN
Router::prefix('admin', function ($routes) {
// Parce que vous êtes dans le scope admin, vous n'avez pas besoin
// d'inclure le prefix /admin ou l'élément de route admin.
    $routes->connect('/utilisateur', ['controller' => 'Users', 'action' => 'index']);
    $routes->connect('/utilisateur/profil/*', ['controller' => 'Users', 'action' => 'view']);
    $routes->connect('/utilisateur/ajouter', ['controller' => 'Users', 'action' => 'add']);
    $routes->connect('/utilisateur/editer/*', ['controller' => 'Users', 'action' => 'edit']);
    $routes->connect('/utilisateur/permission', ['controller' => 'Permissions', 'action' => 'index']);
    $routes->connect('/utilisateur/permission/ajouter', ['controller' => 'Permissions', 'action' => 'add']);
    $routes->connect('/portfolios/', ['controller' => 'Portfolios', 'action' => 'index']);
    $routes->connect('/portfolios/ajouter', ['controller' => 'Portfolios', 'action' => 'add']);
    $routes->connect('/portfolios/editer/*', ['controller' => 'Portfolios', 'action' => 'edit']);
    $routes->connect('/forums/categories', ['controller' => 'Forums', 'action' => 'listcategory']);
    $routes->connect('/forums/creer', ['controller' => 'Forums', 'action' => 'addforum']);
    $routes->connect('/forums/editer', ['controller' => 'Forums', 'action' => 'listforum']);
    $routes->fallbacks(DashedRoute::class);
});

Router::prefix('portfolios', function($routes) {
    $routes->connect('/', ['controller' => 'Portfolios','action' => 'index'], ['routeClass' => 'InflectedRoute']);
    $routes->connect('/:id', ['controller' => 'Portfolios','action' => 'index'],['id' => '[0-9]+','pass'=>['id']], ['routeClass' => 'InflectedRoute']);
    $routes->connect('/voir/*', ['controller' => 'Portfolios','action' => 'view'], ['routeClass' => 'InflectedRoute']);
    $routes->fallbacks(DashedRoute::class);
});
Router::prefix('Tchat', function($routes) {
    $routes->connect('/*', ['controller' => 'Tchats','action' => 'index'], ['routeClass' => 'InflectedRoute']);
    $routes->connect('/add/*', ['controller' => 'Tchats','action' => 'add'], ['routeClass' => 'InflectedRoute']);
    $routes->connect('/rooms', ['controller' => 'Rooms','action' => 'index'], ['routeClass' => 'InflectedRoute']);
    $routes->fallbacks(DashedRoute::class);
});
//---------------------------------------------------------------------------------------------------------DEBUT ROUTES DU FORUM
Router::prefix('Forums', function($routes) {
    $routes->connect('/', ['controller' => 'Forums','action' => 'index'], ['routeClass' => 'InflectedRoute']);
    $routes->connect('/:id-:slug', ['controller' => 'Forums', 'action' => 'view'], ['pass' => ['slug', 'id'], 'id' => '[0-9]+',]);
    $routes->connect('/:id-:slug/creer-un-sujet', ['controller' => 'Threads', 'action' => 'add'], ['pass' => ['slug', 'id'], 'id' => '[0-9]+',]);
    $routes->connect('/:fid-:forum/:id-:slug', ['controller' => 'Threads', 'action' => 'view'], ['pass' => ['fid', 'forum', 'slug', 'id'], 'id' => '[0-9]+',]);
    $routes->connect('/:fid-:forum/:id-:slug/poster-une-reponse', ['controller' => 'Posts', 'action' => 'add'], ['pass' => ['fid', 'forum', 'slug', 'id'], 'id' => '[0-9]+',]);
    $routes->connect('/:fid-:forum/:id-:slug/poster-une-reponse/:quote', ['controller' => 'Posts', 'action' => 'addquote'], ['pass' => ['fid', 'forum', 'slug', 'id', 'quote'], 'id' => '[0-9]+',]);
    $routes->connect('/:fid-:forum/:id-:slug/editer', ['controller' => 'Posts', 'action' => 'edit'], ['pass' => ['fid', 'forum', 'slug', 'id'], 'id' => '[0-9]+',]);
    $routes->connect('/:fid-:forum/:id-:slug/editer-topic', ['controller' => 'Threads', 'action' => 'edit'], ['pass' => ['fid', 'forum', 'slug', 'id'], 'id' => '[0-9]+',]);
    $routes->connect('/rechercher/*', ['controller' => 'Forums', 'action' => 'search']);
    $routes->fallbacks(DashedRoute::class);
});
//---------------------------------------------------------------------------------------------------------FIN ROUTES DU FORUM
Router::prefix('dashboard', function($routes) {
    $routes->connect('/', ['controller' => 'Projects','action' => 'index'], ['routeClass' => 'InflectedRoute']);
    $routes->fallbacks(DashedRoute::class);
});
Router::prefix('utilisateur', function($routes) {
    $routes->connect('/', ['controller' => 'Users','action' => 'index'], ['routeClass' => 'InflectedRoute']);
    $routes->connect('/connexion', ['controller' => 'Users','action' => 'login'], ['routeClass' => 'InflectedRoute']);
    $routes->connect('/deconnexion', ['controller' => 'Users','action' => 'logout'], ['routeClass' => 'InflectedRoute']);
    $routes->connect('/editer/*', ['controller' => 'Users','action' => 'edit'], ['routeClass' => 'InflectedRoute']);
    $routes->connect('/profil/*', ['controller' => 'Users','action' => 'view'], ['routeClass' => 'InflectedRoute']);
    $routes->fallbacks(DashedRoute::class);
});
Router::prefix('promotions', function ($routes){
    $routes->connect('/', ['controller' => 'Promotions','action' => 'index'], ['routeClass' => 'InflectedRoute']);
    $routes->connect('/profil/*', ['controller' => 'Promotions','action' => 'view'], ['routeClass' => 'InflectedRoute']);
    $routes->connect('/ajouter', ['controller' => 'Promotions','action' => 'add'], ['routeClass' => 'InflectedRoute']);
    $routes->connect('/editer/*',['controller' => 'Promotions','action' => 'edit'], ['routeClass' => 'InflectedRoute']);
    $routes->fallbacks(DashedRoute::class);
});

Router::prefix('connecteursmanager', function($routes) {
    $routes->connect('/', ['controller' => 'Permissions','action' => 'index'], ['routeClass' => 'InflectedRoute']);
    $routes->fallbacks(DashedRoute::class);
});

