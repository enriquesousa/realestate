# Laravel 10 - Build Real Estate Property Listing Project A-Z
Kazi Ariyan

# S1 Introduccion
## 01. Que contruiremos



# S3 - Multi Auth with Breeze
## 13. Laravel Multi Auth with Breeze Part 1
## 14. Laravel Multi Auth with Breeze Part 2
- Para ver la lista de routes:
php artisan r:l

- Controlador responsable de redirigir:
app/Http/Controllers/Auth/AuthenticatedSessionController.php

- El control de router esta en:
app/Providers/RouteServiceProvider.php

Entonces para poder redirigir al usuario a nuestras tres rutas posibles:
- user
- admin
- agent

Tenemos que trabajar en:
app/Http/Controllers/Auth/AuthenticatedSessionController.php

Los datos los tomamos del Login Request:
app/Http/Requests/Auth/LoginRequest.php

En app/Http/Controllers/Auth/AuthenticatedSessionController.php 
Entonces podemos agregar el codigo de comparacion de que rol tiene el usuario asi:
```php
$url = '';
if ($request->user()->role === 'admin') {
    $url = 'admin/dashboard';
}elseif($request->user()->role === 'agent'){
    $url = 'agent/dashboard';
}elseif($request->user()->role === 'user'){
    $url = '/dashboard';
}

return redirect()->intended($url);
```
Listo!
Hasta aqui la redireccion esta lista, ahora falta la proteccion de las rutas para que un 
rol de user no pueda entrar a los otros dos dashboards (admin y agent).
## 15. Laravel Multi Auth with Breeze Part 3
Para proteger las rutas, necesitamos usar el middleware que nos ofrece Laravel.
- php artisan make:middleware Role

Nos crea:
app/Http/Middleware/Role.php

Ahora registrar este middleware en app/Http/Kernel.php:
'role' => \App\Http\Middleware\Role::class,

Ahora trabajamos en nuestro middleware app/Http/Middleware/Role.php:
```php
public function handle(Request $request, Closure $next, $role): Response
{
    if ($request->user()->role !== $role) {
        return redirect('dashboard');
    }
    return $next($request);
}
```

Ahora para proteger las rutas aplicamos middleware de grupo en routes/web.php:
```php
// Admin group middleware
Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
});

// Agent group middleware
Route::middleware(['auth','role:agent'])->group(function(){
    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
});
```
Listo!
## 16. Login with Name or Emailor Phone
Cambiar el label del login page en resources/views/auth/login.blade.php:
```php
<!-- Email Address -->
<div>
    <x-input-label for="login" :value="__('Email/Name/Phone')" />
    <x-text-input id="login" class="block mt-1 w-full" type="text" name="login" :value="old('login')" required autofocus autocomplete="username" />
</div>
```

Ahora modificar el codigo en app/Http/Requests/Auth/LoginRequest.php:
```php
use App\Models\User;
use Illuminate\Support\Facades\Hash;

public function rules(): array
{
    return [
        'login' => ['required', 'string'],
        'password' => ['required', 'string'],
    ];
}

public function authenticate(): void
{
    $this->ensureIsNotRateLimited();

    $user = User::where('email', $this->login)
                ->orWhere('name', $this->login)
                ->orWhere('phone', $this->login)
                ->first();

    if( !$user || !Hash::check($this->password, $user->password) ){
        RateLimiter::hit($this->throttleKey());

        throw ValidationException::withMessages([
            'login' => trans('auth.failed'),
        ]);
    }

    Auth::login($user, $this->boolean('remember'));
    RateLimiter::clear($this->throttleKey());
}
```
Listo!
Ya podemos ingresas con nombre, email o phone

# S4 - Admin Panel Setup## 31. Take Backup And Restore in Localhost
Para hacer Backup de todo el proyecto:
Primero remover y limpiar cache de laravel asi:
- php artisan config:cache
- php artisan cache:clear
- php artisan view:clear
- php artisan optimize
## 17. Project Theme Overview
Descargar los recursos (bootstrap backend theme) en:
~/Sites/recursos/udemy/Laravel 10 - Build Real Estate Property Listing Project A-Z/Course+Excise+Files/Course Excise Files
## 18. Admin template Setup
Copiar todo el folder de assets:
/home/enrique/Sites/recursos/udemy/Laravel 10 - Build Real Estate Property Listing Project A-Z/Course+Excise+Files/Course Excise Files/Backend Theme/assets
a:
/home/enrique/Sites/realestate/public

Ahora copiar las carpetas pages y partials de:
/home/enrique/Sites/recursos/udemy/Laravel 10 - Build Real Estate Property Listing Project A-Z/Course+Excise+Files/Course Excise Files/Backend Theme/Main
a:
/home/enrique/Sites/realestate/public/backend

Copiar el dashboard.html de:
/home/enrique/Sites/recursos/udemy/Laravel 10 - Build Real Estate Property Listing Project A-Z/Course+Excise+Files/Course Excise Files/Backend Theme/Main
a:
resources/views/admin/admin_dashboard.blade.php

Actualizar los assets con:
{{asset('') }}

Para parcializar nuestro contenido creamos:
resources/views/admin/index.blade.php
```php
@extends('admin.admin_dashboard')
@section('admin')

    {{-- Contenido --}}
    <div class="page-content"> 
    	...
    </div>
    <!-- End Contenido -->

@endsection
```

En resources/views/admin/admin_dashboard.blade.php:
```php
<!DOCTYPE html>

<html lang="en">

<head> 
	...
</head>

<body>

	<div class="main-wrapper">
	
		<!-- partial:partials/_sidebar.html -->
	    <nav class="sidebar">
			...
		</nav>
	    <!-- partial -->
	
	    <div class="page-wrapper">
	    
			<!-- Header Top Bar partial:partials/_navbar.html -->
          	<nav class="navbar">    
				...
			</nav>

			{{-- Contenido --}}
	      	@yield('admin')

			<!-- partial:partials/_footer.html -->
	      	<footer>
	      		...
      		</footer>
	   		 
	     </div>
	</div>
	
    <!-- core:js -->
    <script src="{{ asset('../assets/vendors/core/core.js') }}"></script>
    <!-- endinject -->
    			
	...
	
</body>

</html>
```
## 19. Dashboard Page Segmentation
Secmentar las secciones, creando:

- resources/views/admin/body/header.blade.php
- resources/views/admin/body/sidebar.blade.php
- resources/views/admin/body/footer.blade.php

En resources/views/admin/admin_dashboard.blade.php
```php
<div class="main-wrapper">

  <!-- partial:partials/_sidebar.html -->
  @include('admin.body.sidebar')

  <div class="page-wrapper">

    <!-- Header Top Bar partial:partials/_navbar.html -->
    @include('admin.body.header')

    {{-- Contenido --}}
    @yield('admin')

    <!-- partial:partials/_footer.html -->
    @include('admin.body.footer')

  </div>

</div>
```
## 20. Admin Logout Option
En resources/views/admin/body/header.blade.php:
```php
 <li class="dropdown-item py-2">
     <a href="{{ route('admin.logout') }}" class="text-body ms-0">
         <i class="me-2 icon-md" data-feather="log-out"></i>
         <span>Log Out</span>
     </a>
 </li>
```

En routes/web.php:
```php
Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
```

En app/Http/Controllers/AdminController.php:
```php
use Illuminate\Support\Facades\Auth;
// Admin Logout
public function AdminLogout(Request $request){

    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');

}
```
## 21. Customize Login Form
En routes/web.php:
Fuera del grupo de Admin group middleware
```php
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
```

En resources/views/admin/admin_login.blade.php:
```php
<head>
	...
	<title>Admin Login Page</title>

    <style type="text/css">
        .authlogin-side-wrapper{
            width: 100%;
            height: 100%;
            background-image: url({{ asset('upload/login.png') }});
        }
    </style>
	...
</head>

<body>
...
	{{-- Side Image --}}
    <div class="col-md-4 pe-md-0">
        <div class="authlogin-side-wrapper">

        </div>
    </div>

    {{-- Formulario de login --}}
    <div class="col-md-8 ps-md-0">
        <div class="auth-form-wrapper px-4 py-5">

            <a href="#"
                class="noble-ui-logo logo-light d-block mb-2">Fotos<span>Oficiales</span></a>
            <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>

            <form class="forms-sample" method="POST" action="{{ route('login') }}">
            @csrf

                {{-- Email/Name/Phone --}}
                <div class="mb-3">
                    <label for="login" class="form-label">Email/Name/Phone</label>
                    <input type="text" name="login" class="form-control" id="login"
                        placeholder="Email, Name, or Phone">
                </div>

                {{-- password --}}
                <div class="mb-3">
                    <label for="userPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        autocomplete="current-password" placeholder="Password">
                </div>

                {{-- Remember me --}}
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="authCheck">
                    <label class="form-check-label" for="authCheck">
                        Remember me
                    </label>
                </div>

                {{-- botón login --}}
                <div>
                    <button type="submit" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                        Login
                    </button>
                </div>

                {{-- Not a user? Sign up --}}
                <a href="register.html" class="d-block mt-3 text-muted">Not a user? Sign up</a>

            </form>

        </div>
    </div>
...
</body>
```
## 22. Refresh Admin Template
Dejar en el sidebar unos cuantos menus, en resources/views/admin/body/sidebar.blade.php:
```php
<li class="nav-item nav-category">Main</li>
<li class="nav-item">
    <a href="{{ route('admin.dashboard') }}" class="nav-link">
        <i class="link-icon" data-feather="box"></i>
        <span class="link-title">Dashboard</span>
    </a>
</li>

{{-- * WEB APPS --}}

{{-- * COMPONENTS --}}

{{-- * DOCS --}}

```

Quitar algunas cosas del header resources/views/admin/body/header.blade.php:
```php
Quitar lo de los lenguajes
```

Dejar soloen resources/views/admin/index.blade.php:
```php
{{-- Row 2 --}}
<div class="row">
  {{-- Monthly sales --}} a  12 columnas

{{-- Row 3 --}}
<div class="row">
    {{-- Inbox --}}
  	{{-- Projects --}}
```
## 23. Update Admin Assets Path
Mover la carpeta de assets a public/backend/assets y modificar en resources/views/admin/admin_dashboard.blade.php:
```php
<link rel="stylesheet" href="{{ asset('backend/assets/vendors/core/core.css') }}">
y en todas las partes donde sea necesario!
```

Tambien modificar los paths en resources/views/admin/admin_login.blade.php:
```php
<link rel="stylesheet" href="{{ asset('../../../assets/vendors/core/core.css') }}">
a
<link rel="stylesheet" href="{{ asset('backend/assets/vendors/core/core.css') }}">
y en todas las partes donde sea necesario!
```

Volver a cargar la pagina y par alimpiar el cache correr:
- php artisan optimize
## 24. Admin Profile & Image Update Part 1
Agregar la ruta a resources/views/admin/body/header.blade.php:
```php
<li class="dropdown-item py-2">
    <a href="{{ route('admin.profile') }}" class="text-body ms-0">
        <i class="me-2 icon-md" data-feather="user"></i>
        <span>Profile</span>
    </a>
</li>
```
En routes/web.php:
```php
Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
```
En app/Http/Controllers/AdminController.php:
```php
// Admin Profile
public function AdminProfile(){
    $id = Auth::user()->id;
    $profileData = User::find($id);
    return view('admin.admin_profile_view', compact('profileData'));
}
```
En resources/views/admin/admin_profile_view.blade.php:
```php
@extends('admin.admin_dashboard')
@section('admin')

@endsection
```
Si hacemos cambios de ruta en web.php y queremos checar los cambios, laravel nos
manda un error como este:
```Route [admin.profile] not defined.```
Para corregir esto correr:
```php artisan optimize```
Para limpiar el cache!
Listo!
## 25. Admin Profile & Image Update Part 2
Customizar la forma izquierda de desplegar datos de perfil.
En resources/views/admin/admin_profile_view.blade.php:
```php
<div class="card-body">
    <div class="d-flex align-items-center justify-content-between mb-2">

        {{-- Foto --}}
        <div>
            <img class="wd-100 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg') }}" alt="profile">
            <span class="h4 ms-3">{{ $profileData->username }}</span>
        </div>

    </div>

    <div class="mt-3">
        <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
        <p class="text-muted">{{ $profileData->name }}</p>
    </div>
    <div class="mt-3">
        <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
        <p class="text-muted">{{ $profileData->email }}</p>
    </div>
    <div class="mt-3">
        <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
        <p class="text-muted">{{ $profileData->phone }}</p>
    </div>
    <div class="mt-3">
        <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
        <p class="text-muted">{{ $profileData->address }}</p>
    </div>
    <div class="mt-3 d-flex social-links">
        <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
            <i data-feather="github"></i>
        </a>
        <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
            <i data-feather="twitter"></i>
        </a>
        <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
            <i data-feather="instagram"></i>
        </a>
    </div>
</div>
```
## 26. Admin Profile & Image Update Part 3
Vamos a trabajar en la forma de la derecha "UPDATE ADMIN PROFILE"
En resources/views/admin/admin_profile_view.blade.php:
```php
@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

{{-- Contenido del profile form html --}}
<div class="page-content">

    <div class="row profile-body">

        <!-- left wrapper - Datos actuales del perfil -->
        <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
            <div class="card rounded">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">

                        {{-- Foto --}}
                        <div>
                            <img class="wd-100 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg') }}" alt="profile">
                            <span class="h4 ms-3">{{ $profileData->username }}</span>
                        </div>

                    </div>

                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
                        <p class="text-muted">{{ $profileData->name }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                        <p class="text-muted">{{ $profileData->email }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                        <p class="text-muted">{{ $profileData->phone }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
                        <p class="text-muted">{{ $profileData->address }}</p>
                    </div>
                    <div class="mt-3 d-flex social-links">
                        <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="github"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="twitter"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- wrapper derecha datos para editar -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">

                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Update Admin Profile</h6>

                        <form class="forms-sample">

                            {{-- username --}}
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $profileData->username }}">
                            </div>

                            {{-- Name --}}
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $profileData->name }}">
                            </div>

                            {{-- Email --}}
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $profileData->email }}">
                            </div>

                            {{-- Phone --}}
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $profileData->phone }}">
                            </div>

                            {{-- Address --}}
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $profileData->address }}">
                            </div>

                            {{-- Seleccionar Photo --}}
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Photo</label>
                                <input type="file" class="form-control" name="photo" id="image">
                            </div>

                            {{-- Desplegar Photo --}}
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label"></label>
                                <img id="showImage" class="wd-80 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg') }}" alt="profile">
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>

</div>

<script type="text/javascript">

    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>

@endsection
```
Usamos java script para poder actualizar la imagen de la photo, y su usamos JS tenemos que traernos
Jquery, el cual lo copiamos de w3 schools.
## 27. Admin Profile & Image Update Part 4
Agregar el mrtodo de post y la ruta a la forma en resources/views/admin/admin_profile_view.blade.php
```php
<form method="POST" action="{{ route('admin.profile.store') }}" class="forms-sample" enctype="multipart/form-data">
@csrf

    {{-- username --}}
    <div class="mb-3">
        <label for="exampleInputUsername1" class="form-label">Username</label>
        <input type="text" name="username" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $profileData->username }}">
    </div>

    {{-- Name --}}
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $profileData->name }}">
    </div>

    {{-- Email --}}
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $profileData->email }}">
    </div>

    {{-- Phone --}}
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $profileData->phone }}">
    </div>

    {{-- Address --}}
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Address</label>
        <input type="text" name="address" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $profileData->address }}">
    </div>

    {{-- Seleccionar Photo --}}
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Photo</label>
        <input type="file" class="form-control" name="photo" id="image">
    </div>

    {{-- Desplegar Photo --}}
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label"></label>
        <img id="showImage" class="wd-80 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg') }}" alt="profile">
    </div>

    <button type="submit" class="btn btn-primary me-2">Save Changes</button>

</form>
```

Crear la ruta en routes/web.php
```php
Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
```

Crear el metodo "AdminProfileStore" en app/Http/Controllers/AdminController.php
```php
// Admin Profile Store
public function AdminProfileStore(Request $request){
    $id = Auth::user()->id;
    $data = User::find($id);

    $data->username = $request->username;
    $data->name = $request->name;
    $data->email = $request->email;
    $data->phone = $request->phone;
    $data->address = $request->address;

    if ($request->file('photo')) {
        $file = $request->file('photo');
        $filename = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('upload/admin_images'), $filename);
        $data['photo'] = $filename; //Guardar a Base de Datos
    }

    $data->save();

    return redirect()->back();
}
```
Listo!
## 28. Adding Tostaer In For View Message
Agregar toaster cdn en resources/views/admin/admin_dashboard.blade.php:
```php
<head>
  	...
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
</head>

<body>
	...
	
	{{-- Toaster cdn --}}
	    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	
	    {{-- Toaster script --}}
	    <script>
	        @if(Session::has('message'))
	            var type = "{{ Session::get('alert-type','info') }}"
	                switch(type){
	                case 'info':
	                toastr.info(" {{ Session::get('message') }} ");
	                break;
	
	                case 'success':
	                toastr.success(" {{ Session::get('message') }} ");
	                break;
	
	                case 'warning':
	                toastr.warning(" {{ Session::get('message') }} ");
	                break;
	
	                case 'error':
	                toastr.error(" {{ Session::get('message') }} ");
	                break;
	            }
	        @endif
	    </script>

</body>
```

Y en app/Http/Controllers/AdminController.php
```php
public function AdminProfileStore(Request $request){

    $id = Auth::user()->id;
    $data = User::find($id);

    $data->username = $request->username;
    $data->name = $request->name;
    $data->email = $request->email;
    $data->phone = $request->phone;
    $data->address = $request->address;

    if ($request->file('photo')) {
        $file = $request->file('photo');
        unlink(public_path('upload/admin_images/'.$data->photo)); // para borrar la imagen anterior
        $filename = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('upload/admin_images'), $filename);
        $data['photo'] = $filename; //Guardar a Base de Datos
    }

    $data->save();

    $notification = array(
        'message' => 'Perfil de Admin Actualizado Correctamente',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
}
```

Para actualizar los datos del profileDropdown menu en resources/views/admin/body/header.blade.php
```php
...
@php

    $id = Auth::user()->id;
    $profileData = App\Models\User::find($id);

@endphp

{{-- profileDropdown --}}
<li class="nav-item dropdown">

    {{-- Imagen de Perfil de Arriba Header --}}
    <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img class="wd-30 ht-30 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg') }}" alt="profile">
    </a>

    <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">

        <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
            {{-- Imagen de Perfil de Abajo Menu --}}
            <div class="mb-3">
                <img class="wd-80 ht-80 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg') }}" alt="">
            </div>
            {{-- nombre y correo --}}
            <div class="text-center">
                <p class="tx-16 fw-bolder">{{ $profileData->name }}</p>
                <p class="tx-12 text-muted">{{ $profileData->email }}</p>
            </div>
        </div>

        {{-- menus --}}
        <ul class="list-unstyled p-1">

            {{-- Profile --}}
            <li class="dropdown-item py-2">
                <a href="{{ route('admin.profile') }}" class="text-body ms-0">
                    <i class="me-2 icon-md" data-feather="user"></i>
                    <span>Profile</span>
                </a>
            </li>

			...
			
        </ul>

    </div>
</li>
```
Listo!
## 29. Admin Profile Change Password Part 1
resources/views/admin/admin_change_password.blade.php
```php
<form method="POST" action="{{ route('admin.profile.store') }}" class="forms-sample" enctype="multipart/form-data">
@csrf


    {{-- Old Password --}}
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Contraseña Vieja</label>
        <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" id="old_password" autocomplete="off">
        @error('old_password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    {{-- New Password --}}
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Contraseña Nueva</label>
        <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" autocomplete="off">
        @error('new_password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    {{-- Confirm Password --}}
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Confirmar Contraseña Nueva</label>
        <input type="password" name="new_password_confirmation" class="form-control" id="new_password_confirmation" autocomplete="off">
    </div>

    <button type="submit" class="btn btn-primary me-2">Save Changes</button>

</form>
```
## 30. Admin Profile Change Password Part 2
Cambios en:
- resources/views/admin/admin_change_password.blade.php
- routes/web.php
- app/Http/Controllers/AdminController.php- 
Para los detalles ver este commit en GitHub.

admin
udemy12345
## 31. Take Backup And Restore in Localhost
Para hacer Backup de todo el proyecto:

1. Primero remover y limpiar cache de laravel asi:
- php artisan config:cache
- php artisan cache:clear
- php artisan view:clear
- php artisan optimize

2. Comprimir toda la carpeta:
-  ~/Sites/realestate
Right click en explorer y comprimir a ZIP, queda un archivo como de 70MB:
- realestate.zip
Ahora exportar la base de datos, exportarla con phpMyadmin
- Export
- Custom
- Tick ON (IF NOT EXIST - less efficient as indexes will be generated during table creation)
- Go
Listo!

Para restaurarlo:
- pasar estos dos archivos a un carpeta y:
- extraer el realestate.zip
- crear una nueva base de datos en phpMyadmin "laravelbackup" por ejemplo.
- importar base de datos de file realestate.sql con phpMyadmin
- ahora ir a la carpeta ~/Sites/realestate_backup/realestate y correr:
- composer update
- para conectarnos a nuestra nueva base de datos importada, modificar .env
```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravelbackup
DB_USERNAME=enrique
DB_PASSWORD=sousa1234
```
- Probar corriendo:
- php artisan serve
Listo!

# Sección 5 - Project Frontend Template Setup
## 32. Frontend Template Setup Part 1
Cargar un tema para el frontend para todo los usuarios.
Copiar el Frontend theme de:
~/Sites/recursos/udemy/Laravel 10 - Build Real Estate Property Listing Project A-Z/Course+Excise+Files/Course Excise Files/Frontend

Crear nuevo controlador
```php
php artisan make:controller UserController
```

Copiar los assets de: ~/Sites/recursos/udemy/Laravel 10 - Build Real Estate Property Listing Project A-Z/Course+Excise+Files/Course Excise Files/Frontend/assets
a: public/frontend/assets

y copiar el index a:
resources/views/frontend/frontend_dashboard.blade.php

Update loas accesos a css js e images, en resources/views/frontend/frontend_dashboard.blade.php:
usando: {{ asset('frontend/') }}
```php
...
<!-- Stylesheets -->
<link href="{{ asset('frontend/assets/css/font-awesome-all.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/flaticon.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/owl.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/jquery.fancybox.min.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/animate.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/jquery-ui.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/nice-select.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/color/theme-color.css') }}" id="jssDefault" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/switcher-style.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/css/responsive.css') }}" rel="stylesheet">
...
<!-- jequery plugins -->
<script src="{{ asset('frontend/assets/js/jquery.js') }}"></script>
<script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/owl.js') }}"></script>
<script src="{{ asset('frontend/assets/js/wow.js') }}"></script>
<script src="{{ asset('frontend/assets/js/validation.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('frontend/assets/js/appear.js') }}"></script>
<script src="{{ asset('frontend/assets/js/scrollbar.js') }}"></script>
<script src="{{ asset('frontend/assets/js/isotope.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jQuery.style.switcher.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery-ui.js') }}"></script>
<script src="{{ asset('frontend/assets/js/nav-tool.js') }}"></script> 
```

En routes/web.php
```php
// Home User Frontend All Route
Route::get('/', [UserController::class, 'index']); 
```

Y en app/Http/Controllers/UserController.php:
```php
public function index(){
    return view('frontend.frontend_dashboard');
} 
```
Antes de probar, No olvidar correr:
```php
php artisan optimize 
```
No funciono!

Ya funciono!
me estaba faltando el asset:
```php 
<!-- main-js -->
<script src="{{ asset('frontend/assets/js/script.js') }}"></script>
```

También actualice todos las {{ asset('frontend/) }} para todas las images de la pagina, que son como 50!







