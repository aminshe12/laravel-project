<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\LoginController;

Route::get  ('/', function () {
    return redirect()->route('login');
});

// Admin
Route::group(["prefix" => "admin"], function (){



});

// User
Route::group(["prefix" => "/"], function (){

    Route::group(['prefix' => 'auth', 'middleware' => 'web'], function () {
        Route::get ('/login', [LoginController::class, 'showLoginForm'])->name('login'      );
        Route::post('/login', [LoginController::class, 'loginStore'   ])->name('user.login.store');
    });

    Route::group(['middleware' => ['auth']] , function() {

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');


        Route::group(["prefix" => "product"], function (){
            Route::get   ("/"         ,[productController::class,"index"    ])->name("product.index"    );
            Route::get   ("/create"   ,[productController::class,"create"   ])->name("product.create"   );
            Route::post  ("/"         ,[productController::class,"store"    ])->name("product.store"    );
            Route::patch ("/{id}"     ,[productController::class,"update"   ])->name("product.update"   );
            Route::delete("/{id}"     ,[productController::class,"destroy"  ])->name("product.delete"   );
            Route::get   ("/edit/{id}",[productController::class,"edit"     ])->name("product.edit"     );

        });

    });
});


Route::group(['prefix' => 'category', 'middleware' => 'auth'], function () {
    Route::get   ("/"         ,[CategoryController::class,"index"   ])->name("category.index"   );
    Route::get   ("/create"   ,[CategoryController::class,"create"  ])->name("category.create"  );
    Route::post  ("/"         ,[CategoryController::class,"store"   ])->name("category.store"   );
    Route::put   ("/{id}"     ,[CategoryController::class,"update"  ])->name("category.update"  );
    Route::delete("/{id}"     ,[CategoryController::class,"destroy" ])->name("category.delete"  );
    Route::get   ("/edit/{id}",[CategoryController::class,"edit"    ])->name("category.edit"    );
});

//Route::group(["prefix" => "api/category"], function (){
//    Route::get   ("/{id}"     ,[CategoryController::class,"getCategoryById"])->name("getCategory");
//});

//route::group(["prefix" => "product"], function (){
//    Route::get   ("/"         ,[productController::class,"index"    ])->name("product.index"    );
//    Route::get   ("/create"   ,[productController::class,"create"   ])->name("product.create"   );
//    Route::post  ("/"         ,[productController::class,"store"    ])->name("product.store"    );
//    Route::patch ("/{id}"     ,[productController::class,"update"   ])->name("product.update"   );
//    Route::delete("/{id}"     ,[productController::class,"destroy"  ])->name("product.delete"   );
//    Route::get   ("/edit/{id}",[productController::class,"edit"     ])->name("product.edit"     );
//
//});

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get   ('/',           [UserController::class, 'index'       ])->name('user.index' );
    Route::get   ('create',      [UserController::class, 'create'      ])->name('user.create');
    Route::post  ('/',           [UserController::class, 'store'       ])->name('user.store' );
    Route::put   ('{id}',        [UserController::class, 'update'      ])->name('user.update');
    Route::delete('{id}',        [UserController::class, 'destroy'     ])->name('user.delete');
    Route::get   ('edit/{id}',   [UserController::class, 'edit'        ])->name('user.edit'  );
    Route::get   ('status/{id}', [UserController::class, 'updateStatus'])->name('user.status');
});


//
//Auth::routes();
