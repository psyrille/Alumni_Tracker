<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap services.
   */
  public function boot(): void
  {
    $verticalMenuJson = file_get_contents(base_path('resources/menu/verticalMenu.json'));
    $verticalMenuData = json_decode($verticalMenuJson);

    $adminVerticalMenuJson = file_get_contents(base_path('resources/menu/adminVerticalMenu.json'));
    $adminVerticalMenuData = json_decode($adminVerticalMenuJson);

    // Share all menuData to all the views
    View::share('menuData', [$verticalMenuData]);
    View::share('adminMenuData', [$adminVerticalMenuData]);
  }
}
