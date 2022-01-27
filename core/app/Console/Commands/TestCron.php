<?php
namespace App\Http\Controllers;
namespace App\Console\Commands;

use App\Http\Controllers\CronController;
use Illuminate\Console\Command;
use App\GeneralSetting;
use App\UserWallet;
use Carbon\Carbon;
use App\Invest;
use App\Trx;
use App\User;
use Illuminate\Support\Facades\Request;

class TestCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:interest';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculate investment maturity period';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        return (new CronController())->cron();
    }

}

