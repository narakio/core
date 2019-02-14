<?php namespace App\Console\Commands;

use App\Jobs\SendMail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Foundation\Bus\DispatchesJobs;

class SendTestEmail extends Command
{
    use DispatchesJobs;

    /**
     * The console command name.
     *
     * @var    string
     */
    protected $signature = 'mail:test 
                            {name : Type of email to send ("welcome", etc.)}';

    /**
     * The console command description.
     *
     * @var    string
     */
    protected $description = 'Send email for testing purposes';

    private $types = [
        'welcome' => '\App\Emails\User\Welcome',
        'contact' => 'App\Emails\Frontend\Contact',
        'password_reset' => '\App\Emails\User\PasswordReset'
    ];


    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $type = $this->argument('name');

        if (isset($this->types[$type])) {
            $data = call_user_func(['self', $type]);
            $this->dispatch(new SendMail(new $this->types[$type]($data)));
            $this->info('The e-mail event was dispatched');
        } else {
            $this->error(sprintf('"%s" is not a valid email type', $type));
        }
    }

    public function welcome()
    {
        return [
            'user' => $this->getUser(),
            'activation_token' => '123456'
        ];
    }

    public function contact()
    {
        return [
            'contact_email' => 'contact_form_sender@example.com',
            'contact_subject' => 'URGENT: Business inquiry (investment opportunity)',
            'message_body' => "Please get in touch with me as soon as possible.",
        ];
    }

    public function password_reset()
    {
        return [
            'user' => $this->getUser(),
            'token' => '123456'
        ];
    }

    private function getUser()
    {
        return (new User())->newQuery()->where('users.user_id', '=', 2)->first();
    }

}