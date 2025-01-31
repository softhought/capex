
<form name="AllocationForm" id="AllocationForm">
    @csrf
    <input type="hidden" name="id" id="id" value="{{ $id }}">
    <input type="hidden" name="budget_master_id" id="budget_master_id" value="{{ $budget_master_id }}">
    <input type="hidden" name="mode" id="mode" value="{{ $mode }}">
<div class="mt-5 grid grid-cols-12 gap-4 gap-y-5">

    <x-input-component column="col-span-12 sm:col-span-12" type="text" label="Budget Entity" name="budget_entity"
    id="budget_entity" class="" placeholder="Enter Budget Entity"
    value="{{ getEditData('Edit', $editData, 'budget_entity') }}" readonly="readonly"  />  
    <x-select-component :data="$yearList" arraykey="value" arrayValue="value" column="col-span-12 sm:col-span-6"
        label="Year *" name="year" id="year" class="" placeholder="Select Year"
        value="{{ getEditData($mode, $editDetailsData, 'year') }}" />
    <x-input-component column="col-span-12 sm:col-span-6" type="text" label="Budget Amount" name="budget_amount"
    id="budget_amount" class="onlynumber" placeholder="Enter Budget Amount"
    value="{{ getEditData($mode, $editDetailsData, 'budget_amount') }}"   />

 
    
</div>
<div class="mt-2 text-success" id="success_msg"></div>
<br>
   <!-- BEGIN: Slide Over Footer -->
   <div class="flex float-end mt-4 px-5 py-3 text-right ">
    <button data-tw-merge="" data-tw-dismiss="modal" type="button" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-secondary text-slate-500 dark:border-darkmode-100/40 dark:text-slate-300 [&:hover:not(:disabled)]:bg-secondary/20 [&:hover:not(:disabled)]:dark:bg-darkmode-100/10 w-20 mr-1">Cancel</button>
    <button data-tw-merge="" type="submit" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary w-20" id="savebtn">{{ $btntext }}</button>
</div>

</form>

<table id="example" data-tw-merge="" class="w-full text-left -mt-2 border-separate border-spacing-y-[10px]">
    <thead data-tw-merge="" class="custom-thead">
        <tr data-tw-merge="" class="">
            <th  class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0">
                Sl
            </th>
            <th  class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0 text-center">
                Action
            </th>
            <th  class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0 text-center">
                Year
            </th>
            <th  class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0">
                Budget Amount
            </th>      
        </tr>
    </thead>
    <tbody>
        @foreach ($allocationData as $key => $list)
            
       
        <tr data-tw-merge="" class="intro-x">
            <td data-tw-merge="" class="px-5 py-3 border-b dark:border-darkmode-300 box w-40 rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">                      
            {{ $key+1 }}
            </td>
            <td data-tw-merge="" class="px-5 py-3 border-b dark:border-darkmode-300 box w-40 rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">                     
          
                <a class="mr-3 flex items-center leftSideModelAllocation" data-tw-merge data-tw-toggle="modal" data-mode="Edit" data-tableid="{{ $budget_master_id }}"  data-tabledtlid="{{ $list->id }}" data-tw-target="#header-footer-slide-over-preview" href="#"  href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="check-square" class="lucide lucide-check-square stroke-1.5 mr-1 h-4 w-4"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                    Edit
                </a>

            </td>  
           
            <td data-tw-merge="" class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                {{  $list->year }}
             </td>
             <td data-tw-merge="" class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
              {{  number_format($list->budget_amount,2) }}
             </td>
          
            
       
                           
        </tr>
        @endforeach

    </tbody>
</table>

