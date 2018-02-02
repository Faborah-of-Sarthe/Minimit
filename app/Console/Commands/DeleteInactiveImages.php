<?php

namespace App\Console\Commands;

use App\Image;
use Illuminate\Console\Command;

class DeleteInactiveImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete the images not related to a poster';

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
     */
    public function handle()
    {
        $images = Image::where('poster_id', null)->get();
        foreach ($images as $image) {
            $image->delete();
        }
    }
}
