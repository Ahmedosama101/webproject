<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\ProgressReport;

class GenerateWeeklyReports extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-weekly-reports';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate and store weekly progress reports';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Calculate the date range for the past week
        $startDate = Carbon::now()->subWeek()->startOfWeek();
        $endDate = Carbon::now()->subWeek()->endOfWeek();

        // Retrieve progress reports within the date range
        $weeklyReports = ProgressReport::whereBetween('date_of_progress', [$startDate, $endDate])->get();

        // Perform any necessary data aggregation or formatting for the report

        // Store or send the report as needed
        // Example: You may store it in a file, send an email, or save it in the database

        $this->info('Weekly reports generated successfully.');
    }
}
