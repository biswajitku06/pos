<?php

Route::get('/','LoginController@login')->name('login');
Route::get('registration','LoginController@registration')->name('registration');
Route::post('register','LoginController@register')->name('register');
Route::Post('post-login','LoginController@postlogin')->name('postlogin');
Route::get('forget-password','LoginController@forgetPassword')->name('forgetPassword');
Route::post('forget-password-process', 'LoginController@forgetPasswordProcess')->name('forgetPasswordProcess');
Route::get('forget-password-reset', 'LoginController@forgetPasswordReset')->name('forgetPasswordReset');
Route::get('forget-password-change/{reset_code}','LoginController@forgetPassChange')->name('forgetPasswordChange');
Route::post('forget-password-reset-process/{reset_code}', 'LoginController@forgetPasswordResetProcess')->name('forgetPasswordResetProcess');
Route::get('logout','LoginController@logout')->name('logout');


Route::group(['namespace'=>'Admin'],function(){
    Route::get('admin-dashboard','AdminController@adminDashboard')->name('adminDashboard');





    //category
    Route::get('add-category','CategoryController@addCategory')->name('addCategory');
    Route::post('add-category','CategoryController@saveCategory')->name('addCategory');
    Route::get('show-category','CategoryController@showCategory')->name('showCategory');
    Route::get('deactivate/{id}','CategoryController@deActivate')->name('deactivate');
    Route::get('activate/{id}','CategoryController@Activate')->name('activate');
    Route::get('edit-category/{id}','CategoryController@editCategory')->name('editCategory');
    Route::get('delete-category/{id}','CategoryController@deleteCategory')->name('deleteCategory');
    Route::post('update-category','CategoryController@updateCategory')->name('updateCategory');


    //brand

    Route::get('add-brand','BrandController@addBrand')->name('addBrand');
    Route::post('add-brand','BrandController@saveBrand')->name('addBrand');
    Route::get('show-brand','BrandController@showBrand')->name('showbrand');
    Route::get('deactivate/{id}','BrandController@deActivate')->name('deactivate');
    Route::get('activate/{id}','BrandController@Activate')->name('activate');
    Route::get('edit-brand/{id}','BrandController@editBrand')->name('editBrand');
    Route::get('delete-brand/{id}','BrandController@deleteBrand')->name('deleteBrand');
    Route::post('update-brand','BrandController@updateBrand')->name('updateBrand');

     //subcategory

    Route::get('add-subcategory','SubCategoryController@addsubCategory')->name('addsubCategory');
    Route::post('add-subcategory','SubCategoryController@savesubCategory')->name('addsubCategory');
    Route::get('show-subcategory','SubCategoryController@showsubCategory')->name('showsubCategory');
    Route::get('deactivate/{id}','SubCategoryController@deActivate')->name('deactivate');
    Route::get('activate/{id}','SubCategoryController@Activate')->name('activate');
    Route::get('edit-subcategory/{id?}','SubCategoryController@editsubCategory')->name('editsubCategory')->where('id','[0-9]+');
    Route::get('delete-subcategory/{id}','SubCategoryController@deletesubCategory')->name('deletesubCategory');
    Route::post('update-subcategory','SubCategoryController@updatesubCategory')->name('updatesubCategory');

    //product
    Route::get('add-product','ProductController@addProduct')->name('addProduct');
    Route::post('add-product','ProductController@saveProduct')->name('addProduct');
    Route::get('show-product','ProductController@showProduct')->name('showProduct');
    Route::get('deactivate/{id}','ProductController@deActivate')->name('deactivate');
    Route::get('activate/{id}','ProductController@Activate')->name('activate');
    Route::get('edit-product/{id}','ProductController@editProduct')->name('editProduct');
    Route::get('delete-product/{id}','ProductController@deleteProduct')->name('deleteProduct');
    Route::post('update-product','ProductController@updateProduct')->name('updateProduct');

    //order
    Route::get('new-order','OrderController@showOrder')->name('newOrder');
    Route::get('new-orders','OrderController@getnewProduct')->name('getnewRow');

});
