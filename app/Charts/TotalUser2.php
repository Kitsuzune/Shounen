<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class TotalUser2
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $user = user::get();
        $post = post::get();
        $data = [
            $user->count(),
            $post->count(),
        ];
        $label = [
            'User',
            'Post',
        ];


        return $this->chart->pieChart()
            ->setTitle('Presentase Total User dan Post Pada Website Shounen Per ' . date('M, Y'))
            ->setSubtitle('ウェブサイト　の　ユーザー　と　とこ　の　わりあい　少年')
            ->addData($data)
            ->setLabels($label)
            ->setWidth(600)
            ->setHeight(600);
    }
}
