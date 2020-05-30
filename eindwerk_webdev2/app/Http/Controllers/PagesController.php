<?php

namespace App\Http\Controllers;

Use App\Page;
Use App\News;
Use App\Donation;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getPage($slug){
        $page = Page::where('slug', $slug)->first();
        if(!$page){
            return redirect()->route('news');
        }
        return view('pages.' . $page->template, [
            'page' => $page,
            'pages' => Page::all(),
        ]);
    }

    public function getSucces () {
        return view('pages.paymentsucces', [
            'pages' => Page::all()
            ]);
    }

    public function getIndex(){
        $news = News::where('visible', true)->orderBy('news.created_at')->paginate(4);
        return view('pages.news', [
            'news' => $news,
            'pages' => Page::all(),
        ]);
    }

    public function getCreateNewsPage() {
        return view('admin.pages.createnews');
    }

    public function getCreateDonationPage() {
        return view('pages.newdonation', [
            'pages'=> Page::all(),
        ]);
    }

    public function getDonations(){
        $donations = Donation::where('visible', true)->orderby('amount', 'desc')->get();
        return view('pages.donations', [
            'donations' => $donations,
            'pages' => Page::all(),
        ]);
    }

    public function getNewsDetailPage($id){
        $news = News::where('id', $id)->first();
        if ($news) {
            return view('pages.newsdetail', [
                'news' => $news,
                'pages' => Page::all(),
            ]);
        } else {
            return redirect()->back();
        }
    }
}
