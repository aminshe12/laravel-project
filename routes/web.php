<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::group(["prefix" => "category"], function (){
    Route::get   ("/"         ,[CategoryController::class,"index"   ])->name("category.index"   );
    Route::get   ("/create"   ,[CategoryController::class,"create"  ])->name("category.create"  );
    Route::post  ("/"         ,[CategoryController::class,"store"   ])->name("category.store"   );
    Route::put   ("/{id}"     ,[CategoryController::class,"update"  ])->name("category.update"  );
    Route::delete("/{id}"     ,[CategoryController::class,"destroy" ])->name("category.delete"  );
    Route::get   ("/edit/{id}",[CategoryController::class,"edit"    ])->name("category.edit"    );

});

route::group(["prefix" => "product"], function (){
    Route::get   ("/"         ,[productController::class,"index"    ])->name("product.index"    );
    Route::get   ("/create"   ,[productController::class,"create"   ])->name("product.create"   );
    Route::post  ("/"         ,[productController::class,"store"    ])->name("product.store"    );
    Route::patch ("/{id}"     ,[productController::class,"update"   ])->name("product.update"   );
    Route::delete("/{id}"     ,[productController::class,"destroy"  ])->name("product.delete"   );
    Route::get   ("/edit/{id}",[productController::class,"edit"     ])->name("product.edit"     );

});

route::group(["prefix" => "user"], function (){
    Route::get   ("/"           ,[userController::class,"index"         ])->name("user.index"     );
    Route::get   ("/create"     ,[userController::class,"create"        ])->name("user.create"    );
    Route::post  ("/"           ,[userController::class,"store"         ])->name("user.store"     );
    Route::put   ("/{id}"       ,[userController::class,"update"        ])->name("user.update"    );
    Route::delete("/{id}"       ,[userController::class,"destroy"       ])->name("user.delete"    );
    Route::get   ("/edit/{id}"  ,[userController::class,"edit"          ])->name("user.edit"      );
    Route::get   ('/status/{id}',[UserController::class,"updateStatus"  ])->name('user.status'    );
});
