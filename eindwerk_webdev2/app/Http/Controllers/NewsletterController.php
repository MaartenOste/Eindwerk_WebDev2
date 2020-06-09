<?php

namespace App\Http\Controllers;

use App\Env;
use Illuminate\Http\Request;
use Spatie\Newsletter\NewsletterFacade as Newsletter;
Use App\Page;

class NewsletterController extends Controller
{
    public function postSubscribe(Request $r)
    {
        $isSubscribed = Newsletter::isSubscribed($r->email);

        if($isSubscribed){
            Newsletter::delete($r->email);
        } else{
            Newsletter::subscribe($r->email);
        }

        return redirect()->route('newsletter', [
            'pages' => Page::all(),
            'isSubscribed' => $isSubscribed,
        ]);
    }

    public function postSave(Request $r){
        $ak = Env::where('name', 'apikey')->first();
        $li = Env::where('name', 'listid')->first();
        $ak->update([
            'key' => $r->apikey,
        ]);
        $li->update([
            'key' => $r->listid,
        ]);

        putenv("MAILCHIMP_APIKEY=". $r->apikey );
        putenv("MAILCHIMP_LIST_ID=". $r->listid );
        return redirect()->route('admin.pages.newsletter');
    }
}
