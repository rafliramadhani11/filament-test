<div class="h-screen flex items-center justify-center max-w-lg mx-auto">

    <form wire:submit="create" class="w-full p-12 bg-gray-50 rounded-lg shadow-lg dark:bg-slate-700">
        {{ $this->form }}

        <button type="submit">
            Submit
        </button>
    </form>

    <button @click="darkMode=!darkMode" type="button"
        class="relative inline-flex flex-shrink-0 h-9 mr-5 transition-colors duration-500 ease-in-out border-2 border-transparent rounded-full cursor-pointer bg-zinc-200 dark:bg-zinc-500/60 w-20"
        role="switch" aria-checked="false">
        <span
            class="relative inline-block w-8 h-8 transition  duration-500 ease-in-out transform bg-white rounded-full shadow pointer-events-none dark:translate-x-11 ring-0">
            <span
                class="absolute inset-0 flex items-center justify-center w-full h-full transition-opacity duration-500 ease-in opacity-100 dark:opacity-0 dark:duration-100 dark:ease-out"
                aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-sun w-5 h-w-5 text-black"
                    viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                    <path
                        d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7">
                    </path>
                </svg>
            </span>
            <span
                class="absolute inset-0 flex items-center justify-center w-full h-full transition-opacity duration-500 ease-out opacity-0 dark:opacity-100 dark:duration-200 dark:ease-in"
                aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="icon icon-tabler icon-tabler-moon w-5 h-5 text-neutral-700" viewBox="0 0 24 24"
                    stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z">
                    </path>
                </svg>
            </span>
        </span>
    </button>


    <x-filament-actions::modals />
</div>
