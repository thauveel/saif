<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <dl class="grid grid-cols-1 gap-0.5 overflow-hidden rounded-2xl text-center sm:grid-cols-2 lg:grid-cols-4">
          <div class="flex flex-col bg-blue-400 p-8">
              <dt class="text-sm font-semibold leading-6 text-gray-600">Teams</dt>
              <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900">8,000+</dd>
            </div>
          
            <div class="flex flex-col bg-fuchsia-400 p-8">
              <dt class="text-sm font-semibold leading-6 text-gray-600">Players</dt>
              <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900">99.9%</dd>
            </div>
            <div class="flex flex-col bg-indigo-400 p-8">
              <dt class="text-sm font-semibold leading-6 text-gray-600">Players</dt>
              <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900">99.9%</dd>
            </div>
          <div class="flex flex-col bg-violet-400 p-8">
              <dt class="text-sm font-semibold leading-6 text-gray-600">Officials</dt>
              <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900">$70M</dd>
            </div>
          
        </dl>
        </div>
    </div>
</x-app-layout>
