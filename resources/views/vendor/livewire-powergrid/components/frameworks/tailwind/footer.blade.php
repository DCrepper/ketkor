<div>
    @includeIf(data_get($setUp, 'footer.includeViewOnTop'))
    <div @class([
        'justify-between' => filled(data_get($setUp, 'footer.perPage')),
        'justify-end' => blank(data_get($setUp, 'footer.perPage')),
        'md:flex md:flex-row w-full items-center py-3 bg-white overflow-y-auto pl-2 pr-2 relative
                                             dark:bg-pg-primary-900' => blank(
            data_get($setUp, 'footer.pagination')),
    ])>
        @if (filled(data_get($setUp, 'footer.perPage')) &&
                count(data_get($setUp, 'footer.perPageValues')) > 1 &&
                blank(data_get($setUp, 'footer.pagination')))
            <div class="mb-2 flex flex-row justify-center md:mb-0 md:justify-start">
                <div class="relative h-10">
                    <select
                        class="bg-pg-primary-50 border border-pg-primary-300 text-pg-primary-700 focus:border-pg-primary-500 dark:bg-pg-primary-700 dark:text-pg-primary-200 dark:placeholder-pg-primary-200 dark:border-pg-primary-600 block appearance-none rounded px-3 py-2 pr-8 leading-tight focus:bg-white focus:outline-none"
                        wire:model.live="setUp.footer.perPage">
                        @foreach (data_get($setUp, 'footer.perPageValues') as $value)
                            <option value="{{ $value }}">
                                @if ($value == 0)
                                    {{ trans('livewire-powergrid::datatable.labels.all') }}
                                @else
                                    {{ $value }}
                                @endif
                            </option>
                        @endforeach
                    </select>

                    <div
                        class="text-pg-primary-700 dark:text-pg-primary-300 pointer-events-none absolute inset-y-0 right-0 flex items-center px-2">
                        <x-livewire-powergrid::icons.down class="h-4 w-4" />
                    </div>
                </div>
                <div class="hidden w-full pl-4 sm:block md:block lg:block" style="padding-top: 6px;">
                </div>
            </div>
        @endif

        @if (filled($data))
            <div>
                @if (method_exists($data, 'links'))
                    {!! $data->links(data_get($setUp, 'footer.pagination') ?: powerGridThemeRoot() . '.pagination', [
                        'recordCount' => data_get($setUp, 'footer.recordCount'),
                        'perPage' => data_get($setUp, 'footer.perPage'),
                        'perPageValues' => data_get($setUp, 'footer.perPageValues'),
                    ]) !!}
                @endif
            </div>
        @endif
    </div>
    @includeIf(data_get($setUp, 'footer.includeViewOnBottom'))
</div>
