
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.tailwindcss.css">

{{-- <div class="intro-y mt-8 flex items-center">
    <h2 class="mr-auto text-lg font-medium">Assets</h2>
</div> --}}

@section('title', 'Locatins')

<div class="mt-5 grid grid-cols-12 ">
    <div class="intro-y col-span-12 mt-2 flex flex-wrap items-center sm:flex-nowrap">
   
    
    </div>

    <div class="intro-y col-span-12 overflow-auto lg:overflow-scroll marginTopMinus40" id="assettype_data">
        <table id="example" data-tw-merge="" class="w-full text-left -mt-2 border-separate border-spacing-y-[10px]">
            <thead data-tw-merge="" class="custom-thead">
                <tr data-tw-merge="" class="">
                    <th  class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0">
                        Sl
                    </th>
                    <th  class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0 text-center">
                        STATUS
                    </th>
                    {{-- <th  class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0 text-center">
                        Action
                    </th> --}}
                    <th  class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0">
                        Location
                    </th>
                   
                  
                    
                  
                   
                   
                </tr>
            </thead>
            <tbody>
                @foreach ($locationList as $key => $list)
                    
               
                <tr data-tw-merge="" class="intro-x">
                    <td data-tw-merge="" class="px-5 py-3 border-b dark:border-darkmode-300 box w-40 rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">                      
                    {{ $key+1 }}
                    </td>
                    <td data-tw-merge="" class="px-5 py-3 border-b dark:border-darkmode-300 box w-40 rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">                     
                        <div class="flex items-center justify-center {{ ($list->is_active=='Y')?"text-success":"text-danger" }} status" data-id="{{ $list->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="check-square" class="lucide lucide-check-square stroke-1.5 mr-2 h-4 w-4"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                            {{ ($list->is_active=='Y')?"Active":"Inactive" }}    
                        </div>
                    </td> 
                    {{-- <td data-tw-merge="" class="px-5 py-3 border-b dark:border-darkmode-300 box w-40 rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">                     
                        <a class="mr-3 flex items-center leftSideModel" data-tw-merge data-tw-toggle="modal" data-mode="Edit" data-tableid="{{ $list->id }}" data-tw-target="#header-footer-slide-over-preview" href="#"  href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="check-square" class="lucide lucide-check-square stroke-1.5 mr-1 h-4 w-4"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                            Edit
                        </a>
                    </td>       --}}
                    <td data-tw-merge="" class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                        {{  $list->location_name }}
                     </td>
                  
                    
                                    
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>


