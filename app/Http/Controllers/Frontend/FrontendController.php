<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $category = Category::latest()->get();

        $sliderNews = News::latest()->limit(3)->get();


        return view('frontend.news.index', compact(
            'category',
            'sliderNews',
        ));
    }

    public function detailNews($slug)
    {
        // get data category
        $category = Category::latest()->get();

        $news = News::where('slug', $slug)->first();

        return view('frontend.news.detail', compact(
            'category',
            'news'
        ));
    }

    public function detailCategory($slug)
    {

        $category = Category::latest()->get();

        $detailCategory = Category::where('slug', $slug)->first();

        $news = News::where('category_id', $detailCategory->id)->latest()->get();

        return view('frontend.news.detailCategory', compact(
            'category',
            'detailCategory'
        ));
    }
}
