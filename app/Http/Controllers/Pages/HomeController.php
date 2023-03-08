<?php

namespace App\Http\Controllers\Pages;

use App\Models\Chef;
use App\Models\About;
use App\Models\Cover;
use App\Models\Event;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\MenuItem;
use App\Models\Testimonial;
use App\Models\MenuCategory;
use Illuminate\Http\Request;
use App\Models\WhyChooseYummy;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    public function index()
    {
        $abouts = About::all();
        $chefs = Chef::all();
        $contacts = Contact::all();
        $covers = Cover::all();
        $events = Event::all();
        $galleries = Gallery::all();
        $menuCategories = MenuCategory::all();
        $menuItems = MenuItem::all();
        $testimonials = Testimonial::all();
        $wcys = WhyChooseYummy::all();

        return view('pages.home', [

            "abouts" => $abouts,
            "chefs" => $chefs,
            "contacts" => $contacts,
            "covers" => $covers,
            "events" => $events,
            "galleries" => $galleries,
            "menuCategories" => $menuCategories,
            "menuItems" => $menuItems,
            "testimonials" => $testimonials,
            "wcys" => $wcys,
        ]);
    }


}
