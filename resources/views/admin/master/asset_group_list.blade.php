
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.tailwindcss.css">

{{-- <div class="intro-y mt-8 flex items-center">
    <h2 class="mr-auto text-lg font-medium">Assets</h2>
</div> --}}

@section('title', 'Asset Group')

<div class="mt-5 grid grid-cols-12 ">

    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible " >
        <table id="example" data-tw-merge="" class="w-full text-left -mt-2 border-separate border-spacing-y-[10px]">
            <thead data-tw-merge="" class="custom-thead">
                <tr data-tw-merge="" class="">
                    <th data-tw-merge="" class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0">
                        Sl
                    </th>
                    <th data-tw-merge="" class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0">
                        Asset Group Name
                    </th>
                    <th data-tw-merge="" class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0 text-center">
                        STATUS
                    </th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach ($assetgroup as $key => $list)
                    
               
                <tr data-tw-merge="" class="intro-x">
                    <td data-tw-merge="" class="px-5 py-3 border-b dark:border-darkmode-300 box w-40 rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">                      
                    {{ $key+1 }}
                    </td>
                    <td data-tw-merge="" class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                       {{  $list->asset_group }}
                    </td>
                    <td data-tw-merge="" class="px-5 py-3 border-b dark:border-darkmode-300 box w-40 rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                        {{-- <div class="flex items-center justify-center text-danger">
                            <i data-tw-merge="" data-lucide="check-square" class="stroke-1.5 mr-2 h-4 w-4"></i>
                            Inactive
                        </div> --}}
                        <div class="flex items-center justify-center {{ ($list->is_active=='Y')?"text-success":"text-danger" }}">
                            <i data-tw-merge="" data-lucide="check-square" class="stroke-1.5 mr-2 h-4 w-4"></i>
                            {{ ($list->is_active=='Y')?"Active":"Inactive" }}    
                        </div>
                    </td>                   
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

