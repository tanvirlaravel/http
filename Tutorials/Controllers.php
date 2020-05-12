<?php include_once '../inc/header.php' ?>
<?php include_once '../inc/nav.php' ?>

<h1 class="my-4 text-info text-center display-3">Controllers</h1>
<div class="row">
    <div class="col-3">
        <div class="nav flex-column nav-pills card" id="v-pills-tab" role="tablist" aria-orientation="vertical">

            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home">Basic Controllers</a>

            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile">Controller Middleware</a>

            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages">Resource Controllers</a>

            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings">Dependency Injection & Controllers</a>

            <a class="nav-link" data-toggle="pill" href="#Fallback-Routes">Route Caching</a>



        </div>
    </div>
    <div class="col-9">
        <div class="tab-content" id="v-pills-tabContent">

            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

                <h4 class="mb-4 py-2 pl-5 pr-2 bg-info d-inline-block">Basic Controllers</h4>

                <h4>Defining Controllers</h4>
                <p>nothing</p>

                <h4>Controllers & Namespaces</h4>
                <p>to nest controllers deeper into the <code>App\Http\Controllers</code> directory.</p>
                <pre class="p-3 text-white-50 bg-dark">
Route::get('foo', 'Photos\AdminController@method');
</pre>


                <h4>Single Action Controllers</h4>
                <p>to nest controllers deeper into the <code>App\Http\Controllers</code> directory.</p>
                <pre class="p-3 text-white-50 bg-dark">
    public function __invoke($id)
    {
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }
    
    
    Route::get('user/{id}', 'ShowProfile');
</pre>

            </div>



            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <h4 class="mb-4 py-2 pl-5 pr-2 bg-info d-inline-block">Controller Middleware</h4>

                <pre class="p-3 text-white-50 bg-dark">
Route::get('profile', 'UserController@show')->middleware('auth');
</pre>

                <pre class="p-3 text-white-50 bg-dark">
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('log')->only('index');

        $this->middleware('subscribed')->except('store');
    }
}
</pre>

                <p>Controllers also allow you to register middleware using a Closure. This provides a convenient way to define a middleware for a single controller without defining an entire middleware class:</p>
                <pre class="p-3 text-white-50 bg-dark">
$this->middleware(function ($request, $next) {
    // ...

    return $next($request);
});
</pre>

            </div>

            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                <h4 class="mb-4 py-2 pl-5 pr-2 bg-info d-inline-block">Resource Controllers</h4>

                <pre class="p-3 text-white-50 bg-dark">
Route::resources([
    'photos' => 'PhotoController',
    'posts' => 'PostController'
]);
                </pre>

                <h4 class="mt-5 mb-4 py-2 pl-5 pr-2 bg-info d-inline-block">Partial Resource Routes</h4>
                <pre class="p-3 text-white-50 bg-dark">
Route::resource('photos', 'PhotoController')->only([
    'index', 'show'
]);

Route::resource('photos', 'PhotoController')->except([
    'create', 'store', 'update', 'destroy'
]);                
                </pre>


                <h4 class="mt-5 mb-4 py-2 pl-5 pr-2 bg-info d-inline-block">API Resource Routes</h4>
                <h4>later</h4>


                <h4 class="mt-5 mb-4 py-2 pl-5 pr-2 bg-info d-inline-block">Nested Resources</h4>
                <h4>later</h4>

                <h4 class="mt-5 mb-4 py-2 pl-5 pr-2 bg-info d-inline-block">Naming Resource Routes</h4>
                <p>By default, all resource controller actions have a route name; however, you can override these names by passing a names array with your options:</p>
                <pre class="p-3 text-white-50 bg-dark">
Route::resource('photos', 'PhotoController')->names([
    'create' => 'photos.build'
]);             
                </pre>

                <h4 class="mt-5 mb-4 py-2 pl-5 pr-2 bg-info d-inline-block">Naming Resource Route Parameters</h4>
                <h4>later</h4>

                <h4 class="mt-5 mb-4 py-2 pl-5 pr-2 bg-info d-inline-block">Localizing Resource URIs</h4>
                <h4>later</h4>

                <h4 class="mt-5 mb-4 py-2 pl-5 pr-2 bg-info d-inline-block">Supplementing Resource Controllers</h4>
                <h4>later</h4>

            </div>

            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                <h4 class="mb-4 py-2 pl-5 pr-2 bg-info d-inline-block">Dependency Injection & Controllers</h4>

                <p><button class="btn btn-outline-warning">PHP Dependency Injection?</button> => Dependency injection is a procedure where one object supplies the dependencies of another object.</p>
                <p>The dependencies can be changed at run time as well as compile time</p>
                <ul>
                    <li><b>Modular:</b> The Dependency Injection helps create completely self-sufficient classes or modules</li>
                    <li><b>Testable:</b>It helps write testable code easily eg unit tests for example</li>
                    <li><b>Maintainable:</b> Since each class becomes modular, it becomes easier to manage it</li>
                </ul>

                <h4>Constructor Injection</h4>
                <p>The Laravel service container is used to resolve all Laravel controllers. As a result, you are able to type-hint any dependencies your controller may need in its constructor. The declared dependencies will automatically be resolved and injected into the controller <instance:></instance:>
                </p>

                <pre class="p-3 text-white-50 bg-dark">
 public function __construct(UserRepository $users)
{
    $this->users = $users;
}
</pre>
                <p>You may also type-hint any Laravel contract. If the container can resolve it, you can type-hint it. Depending on your application, injecting your dependencies into your controller may provide better testability.</p>

                <h4>Method Injection</h4>
                <pre class="p-3 text-white-50 bg-dark">
 public function store(Request $request)
{
    $name = $request->name;

    //
}
</pre>


            </div>

            <div class="tab-pane fade" id="Fallback-Routes">
                <h4 class="mt-5 mb-4 py-2 pl-5 pr-2 bg-info d-inline-block">Route Caching</h4>
                <h4>Later</h4>
            </div>

        </div>
    </div>
</div>




<?php include_once '../inc/footer.php' ?>
