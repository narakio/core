<?php namespace App\Http\Controllers\Ajax\Admin;

use App\Contracts\Models\System;
use App\Http\Controllers\Admin\Controller;
use App\Models\System\SystemEvent;
use Carbon\Carbon;
use Illuminate\Http\Response;

class SystemEventLog extends Controller
{

    /**
     * @param \App\Contracts\Models\System| \App\Support\Providers\System $systemEventRepo
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function show(System $systemEventRepo)
    {
        $events = $systemEventRepo->log()->getFromThisWeek()->get();
        $schedule = [];
        if (!is_null($events)) {
            $today = Carbon::now()->setTime(0, 0, 0);
            $yesterday = Carbon::now()->yesterday();
            $thisWeek = Carbon::now()->startOfWeek();
            foreach ($events as $event) {
                $date = Carbon::createFromFormat(
                    'Y-m-d H:i:s',
                    $event->getAttribute('created_at')
                )->setTime(0, 0, 0);
                $data = unserialize($event->getAttribute('system_event_log_data'));
                $output = clone($data);
                $output->title = trans($data->title[0], $data->title[1]);
                $output->message=[];
                foreach ($data->message as $msg) {
                    $output->message[] = trans($msg[0], $msg[1]);
                }

                if ($date->eq($today)) {
                    unset($output->date);
                    $schedule[trans('general.time.today')][] = $output;
                } elseif ($date->eq($yesterday)) {
                    unset($output->date);
                    $schedule[trans('general.time.yesterday')][] = $output;
                } elseif ($date->lt($yesterday) && $date->gte($thisWeek)) {
                    $schedule[trans('general.time.this_week')][] = $output;
                } else {
                    $schedule[trans('general.time.last_week')][] = $output;
                }
            }
        }
        return response(['events' => $schedule], Response::HTTP_OK);

    }

}