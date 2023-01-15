<?php

namespace App\Console\Commands;

use App\Models\Election;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ExpireElection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'election:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check existing election to know if it has expired';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $time = Carbon::now();
        // dd($time->format('H-i') . " " . $time->format('Y-m-d'));
        // return $time;

        $election = Election::where('status','Active')->where('election_date',$time->format('Y-m-d'))->where('closing_time', $time->format('H:i:s'))->first();
        // $elec_date = date('d-m-Y', strtotime($election->election_date));
        // $elec_time = date('H:i:s', strtotime($election->closing_time));
        // // dd($elec_date . " " . $elec_time);
        // dd($elec_date == $time->format('Y-m-d'));
        // if($election->election_date == $time->format('Y-m-d') && $election->closing_time == $time->format('H:i')){
            $election->status = 'Closed';

            $election->update();
        // }

        // Log::info("Cron is working fine!");
        return Command::SUCCESS;
    }
}
