<?php

namespace App\Http\Controllers;

use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all()->pluck('id')->all();

        $chart = (new LarapexChart)
            ->lineChart()
            ->addLine('Users', $users)
            ->setXAxis(range(1, count($users)))
            ->setTitle('All Users')
            ->toVue();

        return view('dashboard.index', [
            'chart' => $chart
        ]);
    }
}
