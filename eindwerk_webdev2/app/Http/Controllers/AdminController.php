<?php

namespace App\Http\Controllers;

use App\Page;
Use App\Env;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
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

    public function getIndex() {
        $pages = Page::all();

        return view('admin.pages.dashboard',[
            'pages' => $pages
        ]);
    }

    public function getCreatePage() {
        return view('admin.pages.create');
    }

    public function postSavePage(Request $r) {
        $validationRules = [
        ];

        if($r->id) {
            $validationRules['en_title'] = 'required';
            $validationRules['nl_title'] = 'required';
        } else {
            $validationRules['en_title'] = 'required|unique:pages';
            $validationRules['nl_title'] = 'required|unique:pages';
        }

        $r->validate($validationRules);

        $data = [
            'en_title' => $r->en_title,
            'en_intro' => $r->en_intro,
            'slug' => Str::snake($r->en_title),
            'en_content' => $r->en_content,
            'nl_title' => $r->nl_title,
            'nl_intro' => $r->nl_intro,
            'nl_content' => $r->nl_content,
            'template' => $r->template,
            'visible' => $r->visible,
        ];

        if($r->id) {
            $page = Page::where('id', $r->id)->first();
            $page->update($data);
        } else {
            $page = Page::create($data);
        }
        return redirect()->route('pages.index');
    }

    public function getEditPage(Page $page) {
        return view('admin.pages.edit', [
            'page' => $page,
        ]);
    }

    public function getNewsletter() {
        return view('admin.pages.newsletter', [
            'apikey' => Env::where('name', 'apikey')->first()->key,
            'listid' => Env::where('name', 'listid')->first()->key
        ]);
    }

    public function postDeletePage(Request $r) {
        Page::where('id', $r->page_id)->delete();
        return redirect()->route('pages.index');
    }
}
