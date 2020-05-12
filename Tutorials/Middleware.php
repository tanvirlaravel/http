<?php include_once '../inc/header.php' ?>
<?php include_once '../inc/nav.php' ?>

<h1 class="my-4 text-info text-center display-3">Middleware</h1>
<div class="row">
    <div class="col-3">
        <div class="nav flex-column nav-pills card" id="v-pills-tab" role="tablist" aria-orientation="vertical">

            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home">Introduction</a>

            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile">Defining Middleware</a>

            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages">Registering Middleware</a>

            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings">Middleware Parameters</a>

            <a class="nav-link" data-toggle="pill" href="#Fallback-Routes">Terminable Middleware</a>



        </div>
    </div>
    <div class="col-9">
        <div class="tab-content" id="v-pills-tabContent">

            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

                <h4 class="mb-4 py-2 pl-5 pr-2 bg-info d-inline-block">Basic Routing</h4>

                <p>Middleware provide a convenient mechanism for filtering HTTP requests entering application. Laravel includes a middleware that verifies the user of your application is authenticated. If the user is not authenticated, the middleware will redirect the user to the login screen. However, if the user is authenticated, the middleware will allow the request to proceed further into the application.</p>


                <p>All of these middleware are located in the <code>app/Http/Middleware directory</code>.</p>

            </div>



            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <h4 class="mb-4 py-2 pl-5 pr-2 bg-info d-inline-block">Defining Middleware</h4>

                <pre class="p-3 text-white-50 bg-dark">
/**
     * Handle an incoming request.
     
     */
    public function handle($request, Closure $next)
    {
        if ($request->age &lt;= 200) {
            return redirect('home');
        }

        return $next($request);
    }
</pre>
                <p>It's best to envision middleware as a series of "layers" HTTP requests must pass through before they hit your application. Each layer can examine the request and even reject it entirely.</p>
                <p class="bg-warning p-3">All middleware are resolved via the service container, so you may type-hint any dependencies you need within a middleware's constructor.</p>

                <h4>Before & After Middleware</h4>
                <p>Whether a middleware runs before or after a request depends on the middleware itself.</p>
            </div>

            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">

                <h4 class="mb-4 py-2 pl-5 pr-2 bg-info d-inline-block">Registering Middleware</h4>

                <h4>Global Middleware</h4>
                <p>If you want a middleware to run during every HTTP request to your application, list the middleware class in the <code>$middleware</code> property of your <code>app/Http/Kernel.php</code> class.</p>

                <h4>Assigning Middleware To Routes</h4>
                <p><code>app/Http/Kernel.php file</code>.</p>


                <pre class="p-3 text-white-50 bg-dark">
                // Within App\Http\Kernel Class...

protected $routeMiddleware = [
    'auth' => \App\Http\Middleware\Authenticate::class,
];
                </pre>


                <pre class="p-3 text-white-50 bg-dark">
               use App\Http\Middleware\CheckAge;

Route::middleware([CheckAge::class])->group(function () {
    Route::get('/', function () {
        //
    });

    Route::get('admin/profile', function () {
        //
    })->withoutMiddleware([CheckAge::class]);
});                
                </pre>

                <h4>Middleware Groups</h4>
                <pre class="p-3 text-white-50 bg-dark">
protected $middlewareGroups = [
    'web' => [
        \App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\VerifyCsrfToken::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ],

    'api' => [
        'throttle:60,1',
        'auth:api',
    ],
];              
                </pre>

                <pre class="p-3 text-white-50 bg-dark">
Route::get('/', function () {
    //
})->middleware('web');

Route::group(['middleware' => ['web']], function () {
    //
});

Route::middleware(['web', 'subscribed'])->group(function () {
    //
});              
                </pre>
                <p class="bg-warning p-3">Out of the box, the web middleware group is automatically applied to your routes/web.php file by the RouteServiceProvider.</p>

                <h4>Sorting Middleware</h4>
                <p>later</p>
            </div>

            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                <h4 class="mb-4 py-2 pl-5 pr-2 bg-info d-inline-block">Middleware Parameters</h4>

                <p>create a <code>CheckRole</code> middleware</p>
                <pre class="p-3 text-white-50 bg-dark">
class CheckRole
{
    
    public function handle($request, Closure $next, $role)
    {
        if (! $request->user()->hasRole($role)) {
            // Redirect...
        }

        return $next($request);
    }

}
</pre>
                <pre class="p-3 text-white-50 bg-dark">
Route::put('post/{id}', function ($id) {
    //
})->middleware('role:editor');
</pre>


            </div>

            <div class="tab-pane fade" id="Fallback-Routes">
                <h4 class="mt-5 mb-4 py-2 pl-5 pr-2 bg-info d-inline-block">Terminable Middleware</h4>
                <p>Later</p>
            </div>

        </div>
    </div>
</div>




<?php include_once '../inc/footer.php' ?>
