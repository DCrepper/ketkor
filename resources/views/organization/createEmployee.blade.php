<x-layouts.app>
    <div class="">

        <!-- Page Heading -->
        <x-slot name="header">
            <x-button-style-link text="Add user" route="organizations.myorganization">
                Back
            </x-button-style-link>
        </x-slot>

        {{-- Alert Messages --}}
        <x-alert />
        <div class="py-12">
            <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
                <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8">
                    <div class="max-w-xl">
                        <section>
                            <header>
                                <h2 class="text-lg font-medium text-gray-900">
                                    {{ __('User create form') }}
                                </h2>
                            </header>
                            <form class="mt-6 space-y-6" method="POST"
                                action="{{ route('organizations.storeEmployee') }}">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <x-create-input-text name="name" headText="User name" />
                                    <x-create-input-text name="email" type="email" headText="Email" />
                                    <x-create-input-text name="password" type="password" headText="Password" />
                                    <x-create-input-text name="organization_id" type="hidden" :disabled="true"
                                        headText="Email">
                                        {{ auth()->user()->organization->id }}
                                    </x-create-input-text>
                                </div>
                                {{-- Save Button --}}
                                <button
                                    class="rounded bg-blue-500 px-4 py-2 text-center font-bold text-white hover:bg-blue-700 focus:outline-none sm:inline-block"
                                    type="submit">
                                    {{ __('Create') }}
                                </button>

                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
