<div class="group mb-10 relative -mx-4 sm:-mx-8 p-6 sm:p-8 rounded-3xl bg-blue-100 border border-transparent hover:border-gray-100  shadow-2xl shadow-transparent hover:shadow-gray-600/10 sm:gap-8 sm:flex transition duration-300 hover:z-10">
    <div class="sm:w-2/6 rounded-3xl overflow-hidden transition-all duration-500 group-hover:rounded-xl">
        <img
        src="{{ $tournament->logo }}"
        alt="logo"
        loading="lazy"
        width="1000"
        height="667"
        class="h-56 sm:h-full w-full object-cover object-top transition duration-500 group-hover:scale-105"
        />
    </div>
    <div class="sm:p-2 sm:pl-0 sm:w-4/6">
        <div class="flex gap-4 my-5 items-center">
            <div class="w-max relative flex gap-2 h-9 items-center px-4 before:absolute before:inset-0 before:rounded-full before:bg-blue-900/10 before:transition-transform before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95">
                <svg class="relative w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.46609 3.6695C3.77398 5.46143 2 8.52355 2 12C2 13.6186 2.38456 15.1474 3.06729 16.5H3.5C6.65478 16.5 9.63285 15.0435 11.5697 12.5532L12 12C10.4317 9.49075 10.1761 6.37726 11.3142 3.64586L12 2C10.7892 2 9.62861 2.2152 8.55447 2.60943L8.18409 3.37495C7.05502 6.09521 6.76934 9.02891 7.32465 11.8555C7.4045 12.262 7.13974 12.6562 6.7333 12.736C6.32685 12.8159 5.93263 12.5511 5.85278 12.1447C5.29921 9.32691 5.50423 6.41367 6.46609 3.6695Z" fill="#1C274C"/>
                    <path opacity="0.7" d="M14.1551 6.08036C13.7498 5.99457 13.3518 6.25353 13.266 6.65876C13.1802 7.06399 13.4392 7.46204 13.8444 7.54784C16.4253 8.09425 18.8156 9.37745 20.7098 11.2709L20.712 11.2731L21.9788 12.5607L21.9846 12.555C21.8994 14.112 21.4581 15.5741 20.7407 16.8614L20.4997 16.5C18.6255 13.6887 15.4702 12 12.0914 12H11.9997C10.4315 9.49075 10.1759 6.37726 11.314 3.64586L11.9997 2C16.9418 2 21.0465 5.58496 21.8552 10.2962L21.777 10.2168L21.7727 10.2124C19.6711 8.11083 17.0188 6.68666 14.1551 6.08036Z" fill="#1C274C"/>
                    <path opacity="0.4" d="M15.4332 17.3226C15.7712 17.0832 15.8512 16.6151 15.6118 16.277C15.3724 15.939 14.9043 15.859 14.5663 16.0984C11.9689 17.9378 8.82217 19.0429 5.73242 19.0429H4.90097C4.16435 18.3004 3.54339 17.443 3.06738 16.5H3.50009C6.65487 16.5 9.63295 15.0435 11.5698 12.5532L12.0001 12H12.0918C15.4706 12 18.6259 13.6887 20.5001 16.5L20.741 16.8614C19.0325 19.9267 15.7584 22 12.0001 22C10.0714 22 8.27017 21.454 6.74265 20.5081C9.83849 20.2956 12.8902 19.1234 15.4332 17.3226Z" fill="#1C274C"/>
                </svg>
                <span class="w-max relative text-sm font-semibold text-blue-600">
                    {{ Str::ucfirst($tournament->type) }}
                </span>
            </div>
            <div class="w-max relative flex gap-2 h-9 items-center px-4 before:absolute before:inset-0 before:rounded-full before:bg-blue-900/10 before:transition-transform before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95">
                <svg class="relative w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C7.86697 2 5.80046 2 5.19825 3.29918C5.14649 3.41086 5.10282 3.52686 5.06765 3.6461C4.65857 5.0333 6.11981 6.64111 9.0423 9.85674L11 12H13L14.9577 9.85674C17.8802 6.64111 19.3414 5.0333 18.9323 3.6461C18.8972 3.52686 18.8535 3.41086 18.8017 3.29918C18.1995 2 16.133 2 12 2ZM10 4.75C9.58579 4.75 9.25 5.08579 9.25 5.5C9.25 5.91421 9.58579 6.25 10 6.25H14C14.4142 6.25 14.75 5.91421 14.75 5.5C14.75 5.08579 14.4142 4.75 14 4.75H10Z" fill="#1C274C"/>
                    <path opacity="0.5" d="M5.19825 20.7008C5.80046 22 7.86697 22 12 22C16.133 22 18.1995 22 18.8017 20.7008C18.8535 20.5891 18.8972 20.4731 18.9323 20.3539C19.3414 18.9667 17.8802 17.3589 14.9577 14.1433L13 12H11L9.0423 14.1433C6.11981 17.3589 4.65857 18.9667 5.06765 20.3539C5.10282 20.4731 5.14649 20.5891 5.19825 20.7008Z" fill="#1C274C"/>
                    <path d="M10 17.75C9.58579 17.75 9.25 18.0858 9.25 18.5C9.25 18.9142 9.58579 19.25 10 19.25H14C14.4142 19.25 14.75 18.9142 14.75 18.5C14.75 18.0858 14.4142 17.75 14 17.75H10Z" fill="#1C274C"/>
                </svg>
                <span class="w-max relative text-sm font-semibold text-blue-600">
                    {{ $tournament->due_date->toFormattedDateString() }}
                </span>
            </div>
            <div class="w-max relative flex gap-2 h-9 items-center px-4 before:absolute before:inset-0 before:rounded-full before:bg-blue-900/10 before:transition-transform before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95">
                <svg class="relative w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5" d="M12 2C7.58172 2 4 6.00258 4 10.5C4 14.9622 6.55332 19.8124 10.5371 21.6744C11.4657 22.1085 12.5343 22.1085 13.4629 21.6744C17.4467 19.8124 20 14.9622 20 10.5C20 6.00258 16.4183 2 12 2Z" fill="#1C274C"/>
                    <path d="M12 12.5C13.3807 12.5 14.5 11.3807 14.5 10C14.5 8.61929 13.3807 7.5 12 7.5C10.6193 7.5 9.5 8.61929 9.5 10C9.5 11.3807 10.6193 12.5 12 12.5Z" fill="#1C274C"/>
                </svg>
                <span class="w-max relative text-sm font-semibold text-blue-600">
                    {{ $tournament->venue }}
                </span>
            </div>
        </div>
        
        <h3 class="text-2xl font-semibold text-gray-800">
            {{ $tournament->name }}
        </h3>
        @if($tournament->description != null)
        <p class="my-6 text-gray-600">
            {{ $tournament->description }}
        </p>
        @endif

        
        <div class="mt-16 flex flex-wrap gap-y-4 gap-x-6">
            <a href="{{route('front.apply', $tournament)}}"class="relative flex h-11 w-full items-center justify-center px-6 before:absolute before:inset-0 before:rounded-full before:bg-blue-600 before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 sm:w-max">
            <span class="relative text-base font-semibold text-white">Participate</span>
            </a>
            <a href="#" class="relative flex h-11 w-full items-center justify-center px-6 before:absolute before:inset-0 before:rounded-full before:border before:border-gray-200 before:bg-gray-50 before:bg-gradient-to-b before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 sm:w-max">
            <span class="relative text-base font-semibold text-blue-600">Learn more</span>
            </a>
        </div>
    </div>
</div>