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

        // $userRegistrations = User::whereBetween('created_at', [now()->subMonths(3), now()])->get()->groupBy(function($date) {
        //     return Carbon::parse($date->created_at)->format('M Y');
        // });
    
        // $postRegistrations = Post::whereBetween('created_at', [now()->subMonths(3), now()])->get()->groupBy(function($date) {
        //     return Carbon::parse($date->created_at)->format('M Y');
        // });
    
        // $userRegistrationCounts = [];
        // $postRegistrationCounts = [];
        // $labels = [];
    
        // foreach ($userRegistrations as $key => $value) {
        //     $userRegistrationCounts[] = $value->count();
        //     $postRegistrationCounts[] = isset($postRegistrations[$key]) ? $postRegistrations[$key]->count() : 0;
        //     $labels[] = $key;
        // }

        $now = Carbon::now()->format('Y-m-d');
        $yesterday = Carbon::yesterday()->format('Y-m-d');
        $dayafteryes = Carbon::now()->subdays(2)->format('Y-m-d');
        $dayafteryes2 = Carbon::now()->subdays(3)->format('Y-m-d');
        $dayafteryes3 = Carbon::now()->subdays(4)->format('Y-m-d');
        $dayafteryes4 = Carbon::now()->subdays(5)->format('Y-m-d');
        $dayafteryes5 = Carbon::now()->subdays(6)->format('Y-m-d');

        $userreg = User::where('created_at','LIKE',$now.'%')->count();
        $userregyesterday = User::where('created_at','LIKE',$yesterday.'%')->count();
        $userregdayafteryes = User::where('created_at','LIKE',$dayafteryes.'%')->count();
        $userregdayafteryes2 = User::where('created_at','LIKE',$dayafteryes2.'%')->count();
        $userregdayafteryes3 = User::where('created_at','LIKE',$dayafteryes3.'%')->count();
        $userregdayafteryes4 = User::where('created_at','LIKE',$dayafteryes4.'%')->count();
        $userregdayafteryes5 = User::where('created_at','LIKE',$dayafteryes5.'%')->count();

        $postreg = post::where('created_at','LIKE',$now.'%')->count();
        $postregyesterday = post::where('created_at','LIKE',$yesterday.'%')->count();
        $postregdayafteryes = post::where('created_at','LIKE',$dayafteryes.'%')->count();
        $postregdayafteryes2 = post::where('created_at','LIKE',$dayafteryes2.'%')->count();
        $postregdayafteryes3 = post::where('created_at','LIKE',$dayafteryes3.'%')->count();
        $postregdayafteryes4 = post::where('created_at','LIKE',$dayafteryes4.'%')->count();
        $postregdayafteryes5 = post::where('created_at','LIKE',$dayafteryes5.'%')->count();




    
        return $this->chart->lineChart()
            ->setTitle('User and Post Registrations in the Past Months')
            ->setSubtitle('User and Post Registrations')
            ->addData('User Registrations', [$userregdayafteryes5,$userregdayafteryes4,$userregdayafteryes3,$userregdayafteryes2,$userregdayafteryes,$userregyesterday, $userreg])
            ->addData('Post Registrations', [$postregdayafteryes5,$postregdayafteryes4,$postregdayafteryes3,$postregdayafteryes2,$postregdayafteryes,$postregyesterday, $postreg])
            ->setXAxis([$dayafteryes5,$dayafteryes4,$dayafteryes3,$dayafteryes2,$dayafteryes, $yesterday, $now])
            ->setWidth(600)
            ->setHeight(600);
    } 
}
