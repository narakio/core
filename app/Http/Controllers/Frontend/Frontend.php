<?php namespace App\Http\Controllers\Frontend;

use App\Emails\Frontend\Contact;
use App\Events\PersonSentContactRequest;
use App\Events\UserSubscribedToNewsletter;
use App\Http\Requests\Frontend\SendContactEmail;
use App\Jobs\SendMail;
use App\Jobs\SubscribeToNewsletter;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Frontend extends Controller
{
    use DispatchesJobs;

    public function contact()
    {
        return view('frontend.site.contact');

    }

    public function sendContactEmail(SendContactEmail $request)
    {
        event(new PersonSentContactRequest(
                $request->get('sender_email'),
                $request->get('email_subject'),
                $request->get('email_body')
            )
        );
        return redirect(route_i18n('home'))->with(
            'msg',
            ['type' => 'success', 'title' => trans('messages.contact_send_success')]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function newsletterSubscribe(Request $request)
    {
        $input = $request->only('full_name', 'email');
        if (isset($input['full_name']) && isset($input['email'])) {
            $this->dispatch(new SubscribeToNewsletter($input));
        }
        return response([
            'title' => trans('titles.subscribed_msg_title'),
            'text' => trans('titles.subscribed_msg_text')
        ], Response::HTTP_OK);


    }

}