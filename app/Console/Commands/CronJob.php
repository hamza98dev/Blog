<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CronJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update sitemap';

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
        //
        /*$controller = new \App\Http\Controllers\SubscriptionController();
        $controller->updateSubs();*/
        app('App\Http\Controllers\PostController')->generatesitemap();

        $this->info('Sitemap updated Successfully');
    }
}
