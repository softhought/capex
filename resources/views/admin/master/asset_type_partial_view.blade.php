<table id="example" data-tw-merge="" class="w-full text-left -mt-2 border-separate border-spacing-y-[10px]">
    <thead data-tw-merge="" class="custom-thead">
        <tr data-tw-merge="" class="">
            <th  class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0">
                Sl**
            </th>
            <th  class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0">
                Asset Owner
            </th>
            <th  class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0">
                Asset Type
            </th>
            <th  class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0">
                Asset Group 
            </th>
            <th  class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0">
                SAP Asset Class
            </th>
            <th  class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0">
                Block key
            </th>
            <th  class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0">
                Procurement Indicator
            </th>
            
          
            <th  class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0 text-center">
                STATUS
            </th>
           
        </tr>
    </thead>
    <tbody>
        @foreach ($assetType as $key => $list)
            
       
        <tr data-tw-merge="" class="intro-x">
            <td data-tw-merge="" class="px-5 py-3 border-b dark:border-darkmode-300 box w-40 rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">                      
            {{ $key+1 }}
            </td>
            <td data-tw-merge="" class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                {{  $list->company_name }}
             </td>
             <td data-tw-merge="" class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                {{  $list->asset_type }}
             </td>
            <td data-tw-merge="" class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
               {{  $list->asset_group }}
            </td>
            <td data-tw-merge="" class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                {{  $list->sap_asset_class }}
             </td>
             <td data-tw-merge="" class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                {{  $list->block_key }}
             </td>
             <td data-tw-merge="" class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                {{  ($list->is_procurement_indicator=="Y")?"Yes":"No" }}
             </td>
            
            <td data-tw-merge="" class="px-5 py-3 border-b dark:border-darkmode-300 box w-40 rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">                     
                <div class="flex items-center justify-center {{ ($list->is_active=='Y')?"text-success":"text-danger" }} status" data-id="{{ $list->id }}">
                    <i data-tw-merge="" data-lucide="check-square" class="stroke-1.5 mr-2 h-4 w-4"></i>
                    {{ ($list->is_active=='Y')?"Active":"Inactive" }}    
                </div>
            </td>                   
        </tr>
        @endforeach

    </tbody>
</table>