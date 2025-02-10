

<h5 class="mt-1 text-lg font-medium leading-none text-primary mb-2">
    Employee Details
</h5>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400 custom-thead">
            <tr>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                    Employee Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Employee Code
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                    Location
                </th>
                <th scope="col" class="px-6 py-3">
                    Business Division
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b border-gray-200 dark:border-gray-700">
                <th scope="row" class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                    <span class="mr-1 rounded-full bg-success px-1 text-xs text-white">
                        {{ $capexRequest->emp_name }}
                    </span>   
                </th>
                <td class="px-2 py-2">
                    {{ $capexRequest->emp_code }}
                </td>
                <td class="px-2 py-2 bg-gray-50 dark:bg-gray-800">
                    {{ $capexRequest->location_name }}
                </td>
                <td class="px-2 py-2">
                    {{ $capexRequest->business_division }}
                </td>
            </tr>
   
        
        </tbody>
    </table>
</div>

<h5 class="mt-4 text-lg font-medium leading-none text-primary mb-2">
    Request Detail
</h5>

<div class="grid grid-cols-12 gap-x-6 gap-y-6 2xl:gap-x-0 2xl:pl-6"> 

   <!-- -------- ----------------start Col 1-------------------- -->
    <div class="col-span-12 mt-3 md:col-span-4 2xl:col-span-12">
        <div class="mt-2">
            <div class="intro-x">
                <div class="box zoom-in mb-3 flex items-center px-5 py-2">             
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-primary">Request NO</div>
                        <div class="mt-0.5 text-xs text-slate-500  text-dark font-extrabold">
                            {{ $capexRequest->request_no }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-2">
            <div class="intro-x">
                <div class="box zoom-in mb-3 flex items-center px-5 py-2">             
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-primary">Asset Type</div>
                        <div class="mt-0.5 text-xs text-slate-500  text-dark font-extrabold">
                            {{ $capexRequest->asset_type }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-2">
            <div class="intro-x">
                <div class="box zoom-in mb-3 flex items-center px-5 py-2">             
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-primary">Asset Name</div>
                        <div class="mt-0.5 text-xs text-slate-500  text-dark font-extrabold">
                            {{ $capexRequest->asset_name }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
       <!-- -------- ----------------end Col 1-------------------- -->

          <!-- -------- ----------------start Col 2-------------------- -->
    <div class="col-span-12 mt-3 md:col-span-4 2xl:col-span-12">
        <div class="mt-2">
            <div class="intro-x">
                <div class="box zoom-in mb-3 flex items-center px-5 py-2">             
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-primary">Request Date</div>
                        <div class="mt-0.5 text-xs text-slate-500  text-dark font-extrabold">
                            {{ date_dmy($capexRequest->request_date) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-2">
            <div class="intro-x">
                <div class="box zoom-in mb-3 flex items-center px-5 py-2">             
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-primary">Budget Type</div>
                        <div class="mt-0.5 text-xs text-slate-500  text-dark font-extrabold">
                            {{ $capexRequest->budget_type }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-2">
            <div class="intro-x">
                <div class="box zoom-in mb-3 flex items-center px-5 py-2">             
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-primary">Quantity</div>
                        <div class="mt-0.5 text-xs text-slate-500  text-dark font-extrabold">
                            {{ $capexRequest->quantity }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
       <!-- -------- ----------------end Col 2-------------------- -->

                 <!-- -------- ----------------start Col 3-------------------- -->
    <div class="col-span-12 mt-3 md:col-span-4 2xl:col-span-12">
        <div class="mt-2">
            <div class="intro-x">
                <div class="box zoom-in mb-3 flex items-center px-5 py-2">             
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-primary">Asset Group</div>
                        <div class="mt-0.5 text-xs text-slate-500  text-dark font-extrabold">
                            {{ $capexRequest->asset_group }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-2">
            <div class="intro-x">
                <div class="box zoom-in mb-3 flex items-center px-5 py-2">             
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-primary"> Manufacturer</div>
                        <div class="mt-0.5 text-xs text-slate-500  text-dark font-extrabold">
                            {{ $capexRequest->manufacturer }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-2">
            <div class="intro-x">
                <div class="box zoom-in mb-3 flex items-center px-5 py-2">             
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-primary">Total Cost of Procurement</div>
                        <div class="mt-0.5 text-xs text-slate-500  text-dark font-extrabold">
                            <i class="fa fa-inr" aria-hidden="true"></i>
                            {{ $capexRequest->procurement_cost }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
       <!-- -------- ----------------end Col 3-------------------- -->


</div>
<div class="grid grid-cols-12 gap-x-6 gap-y-6 2xl:gap-x-0 2xl:pl-6"> 
    <div class="col-span-12 mt-3 md:col-span-6 2xl:col-span-12">
        <div role="alert" class="alert relative border rounded-md px-5 py-2 bg-pending border-warning text-slate-900 dark:border-warning mb-2 bg-opacity-20">
            <div class="flex items-center">
                <div class="text-lg font-medium">
                    Requirement Description
                </div>
                
            </div>
            <div class="mt-1">
                {{ $capexRequest->requirement_description }}
            </div>
        </div>
    </div>

    <div class="col-span-12 mt-3 md:col-span-6 2xl:col-span-12">
        <div role="alert" class="alert relative border rounded-md px-5 py-2 bg-warning border-warning text-slate-900 dark:border-warning mb-2 bg-opacity-20">
            <div class="flex items-center">
                <div class="text-lg font-medium">
                    Justification
                </div>
                
            </div>
            <div class="mt-1">
                {{ $capexRequest->justification }}
            </div>
        </div>
    </div>

</div>



{{-- <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Sl
                </th>
                <th scope="col" class="px-6 py-3">
                    Proposed Vendor Name 
                </th>
                <th scope="col" class="px-6 py-3">
                    Proposed Vendor Code
                </th>
               
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Apple MacBook Pro 17"
                </th>
                <td class="px-6 py-4">
                    Silver
                </td>
                <td class="px-6 py-4">
                    Laptop
                </td>
               
            </tr>
        
       
        </tbody>
    </table>
</div> --}}



<div class="intro-y mt-5 grid grid-cols-11 gap-5">
    <div class="col-span-12 lg:col-span-7 2xl:col-span-3">
        <div class="box rounded-md p-3">
            <div class="mb-1 flex items-center border-b border-slate-200/60 pb-2 dark:border-darkmode-400">
                <div class="truncate text-base font-medium text-primary">
                    Proposed Vendor
                </div>
             
            </div>
            @foreach($proposedVendor as $key => $proposed_vendor)
            <div class="flex items-center">              
                {{ $key+1 }}.
                <a class="ml-1 decoration-dotted" href="#">
                    {{ $proposed_vendor->vendor_name }}-{{ $proposed_vendor->vendor_code }}
                </a>
            </div>
            @endforeach
          

           
        </div>
 
    </div>

    <div class="col-span-12 lg:col-span-3 2xl:col-span-3">
        <div class="box rounded-md p-3">
            <div class="mb-1 flex items-center border-b border-slate-200/60 pb-2 dark:border-darkmode-400">
                <div class="truncate text-base font-medium text-primary">
                    Asset Quotation
                </div>
             
            </div>
            <div class="flex items-center">
                <a href="{{ asset('storage/asset_quotation_file/' . $capexRequest->asset_quotation_file) }}" target="_blank" >
                <button class="transition duration-200 border shadow-sm inline-flex items-center justify-center rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed text-xs py-1.5 px-2 bg-primary border-primary text-white dark:border-primary mb-2 mr-1 w-30">Attachment &nbsp;
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="file" class="lucide lucide-file stroke-1.5 w-5 h-5 mx-auto block"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
               </button></a>
                
            </div>
       
         
        </div>
 
    </div>

</div>

<div class="intro-y box col-span-12 lg:col-span-6 mt-2">
    <div class="flex items-center border-b border-slate-200/60 px-5 py-5 dark:border-darkmode-400 sm:py-3">
        <h2 class="mr-auto text-base font-medium text-primary">Approval Process</h2>
   
    </div>
    <div class="p-2">
        @foreach ($approvalProcess as $key2 => $approval_process)
            
        
        <div class="relative flex items-center mb-2 border-b border-slate-200/60">
            <button class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed h-10 w-10 rounded-full bg-slate-100  dark:border-darkmode-400 dark:bg-darkmode-400 text-primary border-primary">
                {{ $key2+1 }}</button>
            <div class="ml-4 mr-auto">
                <a class="font-medium" href="#">
                  {{ $approval_process->approver_name }} - {{ $approval_process->emp_name }} ({{ $approval_process->approver_emp_code }})
                </a>
                <div class="mr-5 text-slate-500 sm:mr-5">
                    Comment:-{{ $approval_process->comment }}
                </div>
            </div>
            <div class="font-medium text-slate-600 dark:text-slate-500">
               @if($approval_process->is_open=='Y')
                  @if($approval_process->is_approved=='N')
                     <h5 class=" font-medium leading-none text-warning"> Pending</h5>
                  @elseif($approval_process->is_approved=='A')
                       <h5 class=" font-medium leading-none text-success" style="color: rgb(130, 200, 23);"> Approved</h5>
                  @else
                       <h5 class=" font-medium leading-none text-danger"> Rejected</h5>
                  @endif
               @else
                --
               @endif
            </div>
        </div>
        @endforeach
     
   
 
    </div>
</div>

<div role="alert" class="alert relative border rounded-md px-5 py-2 bg-success border-success text-slate-900 dark:border-success mb-2 mt-2 w-60" style="background-color: rgb(130, 200, 23);">
    <b>Sanction No:</b></div>