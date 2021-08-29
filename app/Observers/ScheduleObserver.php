<?php

namespace App\Observers;

use App\Models\Schedule;

class ScheduleObserver
{
    /**
     * Handle the schedule "created" event.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return void
     */
    public function created(Schedule $schedule)
    {
        //
    }

    /**
     * Handle the schedule "updated" event.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return void
     */
    public function updated(Schedule $schedule)
    {
        //
    }

    /**
     * Handle the schedule "deleted" event.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return void
     */
    public function deleted(Schedule $schedule)
    {
        $date = date('Y-m-d', strtotime($schedule->date));
        foreach($schedule->majors as $major){
            foreach($major->users as $user){
                $user->notifications()->create([
                    'content' => 'ໄດ້ມີການຍົກເລີກຊົ່ວໂມງຮຽນສໍາລັບວັນທີ '.$date.' ເວລາ '.$schedule->starttime,
                    'reference' => '/showschedule/'.$date,
                    'read' => false
                ]);
            }
        }
    }

    /**
     * Handle the schedule "restored" event.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return void
     */
    public function restored(Schedule $schedule)
    {
        //
    }

    /**
     * Handle the schedule "force deleted" event.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return void
     */
    public function forceDeleted(Schedule $schedule)
    {
        //
    }
}
