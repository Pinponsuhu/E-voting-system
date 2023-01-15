<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class LastVotePercentage
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $non_voters = \App\Models\Voter::where('status', "Not Voted")->count();
        $voters = \App\Models\Voter::where('status', "Voted")->count();

        return $this->chart->donutChart()
            ->setTitle('Chart of Accredited Voters to Accredited Non-voters')
            ->setSubtitle('Election 2021.')
            ->addData([$voters, $non_voters])
            ->setLabels(['Voters', 'Non-voters']);
    }
}
