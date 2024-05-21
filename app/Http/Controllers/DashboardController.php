<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Livestock;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all()->pluck('id')->all();
        $lives = Livestock::all()->pluck('id')->all();

        $chart = (new LarapexChart)
            ->barChart()
            ->addBar('Users', $users)
            ->setXAxis(range(1, count($users)))
            ->setTitle('All Users')
            ->toVue();

        $lineChart = (new LarapexChart)
            ->lineChart()
            ->addLine('Users', $lives)
            ->setXAxis(range(1, count($lives)))
            ->setTitle('All Animals')
            ->toVue();

        return view('dashboard.index', [
            'chart' => $chart,
            'lineChart' => $lineChart,
        ]);
    }
}
