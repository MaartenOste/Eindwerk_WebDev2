<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function getAllNews(){
        $news = News::get();
        return view('admin.pages.news', [
            'news' => $news
        ]);
    }

    public function postDelete(Request $r) {
        News::where('id', $r->post_id)->delete();
        return redirect()->route('admin.pages.news');
    }

    public function getEditDetailPage($id){
        $news = News::where('id', $id)->first();
        if ($news) {
            return view('admin.pages.newsdetail', [
                'news' => $news
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function postSave(Request $r) {
        $validationRules = [
        ];

        if($r->id) {
            $validationRules['en_title'] = 'required';
            $validationRules['nl_title'] = 'required';
        } else {
            $validationRules['en_title'] = 'required|unique:news';
            $validationRules['nl_title'] = 'required|unique:news';
        }

        $r->validate($validationRules);

        $data = [
            'en_title' => $r->en_title,
            'en_intro' => $r->en_intro,
            'en_content' => $r->en_content,
            'nl_title' => $r->nl_title,
            'nl_intro' => $r->nl_intro,
            'nl_content' => $r->nl_content,
            'visible' => $r->visible,
            'imgurl' => 'images/newsimages/streamer.jpg',
        ];

        if($r->id) {
            $client = News::where('id', $r->id)->first();
            $client->update($data);
        } else {
            $client = News::create($data);
        }

        return redirect()->route('admin.pages.news');
    }

    public function postSoftdelete(Request $r){
        $temp = News::where('id', $r->post_id)->first();
        News::where('id', $r->post_id)->update(array('visible' => !$temp->visible));
        return redirect()->route('admin.pages.news');
    }

    public function getIndex() {
        $news = News::where('visible', true)->orderBy('news.created_at')->paginate(4);
        return view('pages.news', [
            'news' => $news
        ]);
    }
}
