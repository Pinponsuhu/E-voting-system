<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class ElectionChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        return $this->chart->lineChart()
            ->setTitle('Ojo Presidential Election Result')
            ->setSubtitle('All candidates results Ojo')
            // ->addData('Physical sales', [40, 93, 35, 42])
            ->addData([70, 29, 77, 28])
            ->setXAxis(['Pinponsuhu Joseph', 'Adekoya Emmanuel', 'Sanusi victor', 'Ajose Olabisi']);
    }
}
