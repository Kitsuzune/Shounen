<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class TotalUser
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\lineChart
    {
        // $user = user::get();
        // $post = post::get();
        // $data = [
        //     $user->count(),
        //     $post->count(),
        // ];
        // $label = [
        //     'User',
        //     'Post',
        // ];


        // return $this->chart->pieChart()
        //     ->setTitle('Presentase User dan Post Pada Website Shounen Per ' . date('M, Y'))
        //     ->setSubtitle('ウェブサイト　の　ユーザー　と　とこ　の　わりあい　少年')
        //     ->addData($data)
        //     ->setLabels($label);

        $userRegistrations = User::whereBetween('created_at', [now()->subMonths(3), now()])->get()->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('M Y');
        });
    
        $postRegistrations = Post::whereBetween('created_at', [now()->subMonths(3), now()])->get()->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('M Y');
        });
    
        $userRegistrationCounts = [];
        $postRegistrationCounts = [];
        $labels = [];
    
        foreach ($userRegistrations as $key => $value) {
            $userRegistrationCounts[] = $value->count();
            $postRegistrationCounts[] = isset($postRegistrations[$key]) ? $postRegistrations[$key]->count() : 0;
            $labels[] = $key;
        }
    
        return $this->chart->lineChart()
            ->setTitle('User and Post Registrations in the Past Months')
            ->setSubtitle('User and Post Registrations')
            ->addData('User Registrations', $userRegistrationCounts)
            ->addData('Post Registrations', $postRegistrationCounts)
            ->setXAxis($labels)
            ->setWidth(600)
            ->setHeight(600);
    } 
}
