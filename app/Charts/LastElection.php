<?php

namespace App\Charts;

use App\Models\VotingHistory;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class LastElection
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $candiates = \App\Models\Electorate::where('position', "Presidency")->get();
        // dd($candiates);
        $canArry = [];
        $canTally = [];
        foreach($candiates as $candiate){
            $tally = VotingHistory::where('presidency',$candiate->id)->count();
            // dd($tally);
            array_push($canArry, $candiate->fullname);
            array_push($canTally, $tally);
        }
        // dd($canArry);
        return $this->chart->pieChart()
            ->setTitle('All Presidential Candidate Result')
            ->setSubtitle('Presidency Election 2021.')
            ->addData($canTally)
            ->setLabels($canArry);
    }
}
