<?php

namespace App\Console\Commands;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Console\Command;

class PublishScheduledPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:publish-scheduled';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish the scheduled posts.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();
        Post::where('is_published', false)
            ->where('published_at', '<=', $now)
            ->update(['is_published' => true]);
        
        $this->info('Scheduled posts published successfully.');
    }
}
