<?php

declare(strict_types=1);

use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

use App\Orchid\Screens\Tag\TagListScreen;
use App\Orchid\Screens\Tag\TagEditScreen;
use App\Orchid\Screens\Order\OrderListScreen;
use App\Orchid\Screens\Order\OrderDetailScreen;
use App\Orchid\Screens\Carousel\SlideListScreen;
use App\Orchid\Screens\Carousel\SlideEditScreen;
use App\Orchid\Screens\Product\ProductListScreen;
use App\Orchid\Screens\Product\ProductEditScreen;
use App\Orchid\Screens\Category\CategoryListScreen;
use App\Orchid\Screens\Category\CategoryEditScreen;
use App\Orchid\Screens\Promocode\PromocodeEditScreen;
use App\Orchid\Screens\Promocode\PromocodeListScreen;

// Platform > Promocodes
Route::screen('promocode/list', PromocodeListScreen::class)
  ->name('platform.promocode.list');

Route::screen('promocode/edit/{promocode?}', PromocodeEditScreen::class)
  ->name('platform.promocode.edit');

// Platform > Products
Route::screen('product/list', ProductListScreen::class)
  ->name('platform.product.list');

Route::screen('product/edit/{product?}', ProductEditScreen::class)
  ->name('platform.product.edit');

// Platform > Categories
Route::screen('category/list', CategoryListScreen::class)
  ->name('platform.category.list');

Route::screen('category/edit/{category?}', CategoryEditScreen::class)
  ->name('platform.category.edit');

// Platform > Tags
Route::screen('tag/list', TagListScreen::class)
  ->name('platform.tag.list');

Route::screen('tag/edit/{tag?}', TagEditScreen::class)
  ->name('platform.tag.edit');

// Platform > Carousel
Route::screen('slide/list', SlideListScreen::class)
  ->name('platform.slide.list');

Route::screen('slide/edit/{slide?}', SlideEditScreen::class)
  ->name('platform.slide.edit');

// Platform > Orders
Route::screen('order/list', OrderListScreen::class)
  ->name('platform.order.list');

Route::screen('order/detail/{order?}', OrderDetailScreen::class)
  ->name('platform.order.detail');


// Main
Route::screen('/main', PlatformScreen::class)
  ->name('platform.main');

// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
  ->name('platform.profile')
  ->breadcrumbs(fn (Trail $trail) => $trail
    ->parent('platform.index')
    ->push(__('Profile'), route('platform.profile')));

// Platform > System > Users > User
Route::screen('users/{user}/edit', UserEditScreen::class)
  ->name('platform.systems.users.edit')
  ->breadcrumbs(fn (Trail $trail, $user) => $trail
    ->parent('platform.systems.users')
    ->push($user->name, route('platform.systems.users.edit', $user)));

// Platform > System > Users > Create
Route::screen('users/create', UserEditScreen::class)
  ->name('platform.systems.users.create')
  ->breadcrumbs(fn (Trail $trail) => $trail
    ->parent('platform.systems.users')
    ->push(__('Create'), route('platform.systems.users.create')));

// Platform > System > Users
Route::screen('users', UserListScreen::class)
  ->name('platform.systems.users')
  ->breadcrumbs(fn (Trail $trail) => $trail
    ->parent('platform.index')
    ->push(__('Users'), route('platform.systems.users')));

// Platform > System > Roles > Role
Route::screen('roles/{role}/edit', RoleEditScreen::class)
  ->name('platform.systems.roles.edit')
  ->breadcrumbs(fn (Trail $trail, $role) => $trail
    ->parent('platform.systems.roles')
    ->push($role->name, route('platform.systems.roles.edit', $role)));

// Platform > System > Roles > Create
Route::screen('roles/create', RoleEditScreen::class)
  ->name('platform.systems.roles.create')
  ->breadcrumbs(fn (Trail $trail) => $trail
    ->parent('platform.systems.roles')
    ->push(__('Create'), route('platform.systems.roles.create')));

// Platform > System > Roles
Route::screen('roles', RoleListScreen::class)
  ->name('platform.systems.roles')
  ->breadcrumbs(fn (Trail $trail) => $trail
    ->parent('platform.index')
    ->push(__('Roles'), route('platform.systems.roles')));

//Route::screen('idea', Idea::class, 'platform.screens.idea');
