<div class="mx-auto mb-4">
    <div class="flex-row md:flex items-center justify-between">
        <div class="flex items-center space-x-5">
            <div class="flex-shrink-0">
                <div class="relative">
                    @if($team['logo'])
                        <img class="h-16 w-16 rounded-full ring-1 ring-gray-900/1" src="{{ asset('storage/' . $team['logo']) }}" alt="">
                    @endif
                    <span class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></span>
                </div>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-gray-900">{{$team->name}}</h1>
                <p class="text-sm font-medium text-gray-500">{{$team->email}} | {{$team->phone}} </p>
            </div>
        </div>
        
        <div class="flex justify-between gap-2 sm:mt-0 mt-4">
        <div class="rounded-full bg-indigo-400/10 px-2 py-1 text-xs font-medium text-indigo-400 ring-1 ring-inset ring-indigo-400/30">{{ Str::ucfirst($team->status) }}</div>
        <a href="{{ route('front.apply', $team->tournament). '?team=' . $team->id}}" class="flex gap-1 rounded-full bg-indigo-400/10 px-2 py-1 text-xs font-medium text-indigo-400 ring-1 ring-inset ring-indigo-400/30">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-3.5 w-3.5 items-center" viewBox="0 0 24 24">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.27683 7.93412C-0.359205 10.5702 -0.359205 14.844 2.27683 17.4801C3.49894 18.7022 5.07487 19.3581 6.67442 19.4467C7.088 19.4696 7.44184 19.1529 7.46475 18.7393C7.48766 18.3258 7.17096 17.9719 6.75738 17.949C5.51211 17.88 4.28862 17.3705 3.33749 16.4194C1.28724 14.3691 1.28724 11.045 3.33749 8.99478L6.16592 6.16635C8.21617 4.1161 11.5403 4.1161 13.5905 6.16635C15.6408 8.2166 15.6408 11.5407 13.5905 13.591L12.1763 15.0052C11.8834 15.2981 11.8834 15.773 12.1763 16.0658C12.4692 16.3587 12.9441 16.3587 13.237 16.0658L14.6512 14.6516C17.2872 12.0156 17.2872 7.74173 14.6512 5.10569C12.0152 2.46965 7.7413 2.46965 5.10526 5.10569L2.27683 7.93412Z" fill="#1C274C"/>
                <path opacity="0.5" d="M10.4088 17.8336C8.35853 15.7834 8.35853 12.4593 10.4088 10.409L11.823 8.99481C12.1159 8.70191 12.1159 8.22704 11.823 7.93415C11.5301 7.64125 11.0552 7.64125 10.7623 7.93415L9.34812 9.34836C6.71208 11.9844 6.71208 16.2583 9.34812 18.8943C11.9842 21.5303 16.258 21.5303 18.8941 18.8943L21.7225 16.0659C24.3585 13.4298 24.3585 9.15597 21.7225 6.51993C20.5004 5.29783 18.9245 4.6419 17.3249 4.55329C16.9113 4.53038 16.5575 4.84708 16.5346 5.26066C16.5117 5.67424 16.8284 6.02809 17.2419 6.051C18.4872 6.11998 19.7107 6.62946 20.6618 7.58059C22.7121 9.63085 22.7121 12.955 20.6618 15.0052L17.8334 17.8336C15.7832 19.8839 12.459 19.8839 10.4088 17.8336Z" fill="#1C274C"/>
            </svg>
            <span class="block tracking-wide">Get your team link</span>
        </a>
        </div>
        
    </div>
    
</div>
