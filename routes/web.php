<?php
use Illuminate\Http\Request;
use App\Product;//Modelo para productos

Route::middleware('auth')->group(function(){//encerar todo aqui para forzar autenticacion para visitar
    Route::get("/", function () {
        return view('index', compact('Products')); //resources/views/index.blade.php
    });

    Route::get("products", function () {
        //$Products = Product::all();//Lista todo en orden por defecto
        $Products = Product::orderBy('created_at', 'desc')->get(); //Lista todo en el orden indicado
        return view('products.index', compact('Products')); //resources/views/products/index.blade.php
    })->name('products.index');

    Route::get("products/create", function () {
        return view('products.create'); //resources/views/products/create.blade.php
    })->name('products.create');

    Route::post('products', function (Request $request) {
        $Product = new Product(); //App/Product.php
        $Product->description = $request->input('description');
        $Product->price = $request->input('price');
        $Product->save();
        //return $request->all();
        return redirect()->route('products.index')->with('info', 'Producto creado existosamente');
    })->name('products.store');

    Route::delete('products/{id}', function ($id) {
        $Product = Product::findOrFail($id);
        $Product->delete();
        return redirect()->route('products.index')->with('info', 'Producto eliminado existosamente');
    })->name('products.destroy');

    Route::get('products/{id}/edit', function ($id) {
        $Product = Product::findOrFail($id);
        return view('products.edit', compact('Product'));
    })->name('products.edit');

    Route::put('products/{id}', function (Request $request, $id) {
        $Product = Product::findOrFail($id);
        $Product->description = $request->input('description');
        $Product->price = $request->input('price');
        $Product->save();
        //return $request->all();
        return redirect()->route('products.index')->with('info', 'Producto actualizado existosamente');
    })->name('products.update');

    Route::get('/tasks', 'TaskController@index')->name('tasks.index'); //Controller @ function/method
    Route::get('/tasks/{id}', 'TaskController@editView')->name('tasks.edit_view'); //Controller @ function/method
    Route::get('/tasks/edit/{id}', 'TaskController@edit')->name('tasks.edit'); //Controller @ function/method
    Route::post('/tasks', 'TaskController@store')->name('tasks.store'); //Controller @ function/method
    Route::delete('/tasks/{id}', 'TaskController@destroy')->name('tasks.destroy'); //Controller @ function/method
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');//usar esto, si no empleo el middleware en Route...; //Controller @ function/method
