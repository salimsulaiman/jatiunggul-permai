<div class="mb-6 flex flex-wrap items-center justify-between gap-3">
    <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90" x-text="pageName"></h2>

    <nav>
        <ol class="flex items-center gap-1.5">
            <!-- Home -->
            <li>
                <a class="inline-flex items-center gap-1.5 text-sm text-gray-500 dark:text-gray-400" href="/">
                    Home
                    <svg class="stroke-current" width="17" height="16" viewBox="0 0 17 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.0765 12.667L10.2432 8.50033L6.0765 4.33366" stroke="currentColor" stroke-width="1.2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </li>

            <!-- Page Name (Link) -->
            <li class="flex items-center gap-1.5">
                <a href="#" class="inline-flex items-center gap-1.5 text-sm text-gray-500 dark:text-gray-400">
                    <span x-text="pageName"></span>
                    <svg x-show="subPage" class="stroke-current text-gray-500 dark:text-gray-400" width="17"
                        height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.0765 12.667L10.2432 8.50033L6.0765 4.33366" stroke="currentColor" stroke-width="1.2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </li>

            <!-- Sub Page -->
            <li class="flex items-center gap-1.5" x-show="subPage">
                <span class="text-sm text-gray-800 dark:text-white/90" x-text="subPage"></span>
            </li>
        </ol>

    </nav>
</div>
