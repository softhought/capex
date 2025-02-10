<table id="example" data-tw-merge="" class="w-full text-left -mt-2 border-separate border-spacing-y-[10px]">
    <thead data-tw-merge="" class="custom-thead">
        <tr data-tw-merge="" class="">
            <th  class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0">
                Sl
            </th>
           
            <th  class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0">
                Approver Name
            </th>
            <th  class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0">
                Employee Name
            </th>
            <th  class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0">
                Employee Code
            </th>
           
          
            <th  class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0 text-center">
                Action
            </th>
           
          
            
          
           
           
        </tr>
    </thead>
    <tbody>
        @foreach ($approverList as $key => $list)
            
       
        <tr data-tw-merge="" class="intro-x">
            <td data-tw-merge="" class="px-5 py-3 border-b dark:border-darkmode-300 box w-40 rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">                      
            {{ $key+1 }}
            </td>
              
            <td data-tw-merge="" class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                {{  $list->approver_name }}
             </td> 
            <td data-tw-merge="" class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                {{  $list->emp_name }}
             </td>

             <td data-tw-merge="" class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                {{  $list->emp_no }}
             </td>

       
            <td data-tw-merge="" class="px-5 py-3 border-b dark:border-darkmode-300 box w-40 rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">                     
              @if($list->is_dynamic=='N')
              <a class="mr-3 flex items-center justify-center leftSideModel" data-tw-merge data-tw-toggle="modal" data-mode="Edit" data-tableid="{{ $list->id }}" data-tw-target="#header-footer-slide-over-preview" href="#"  href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="check-square" class="lucide lucide-check-square stroke-1.5 mr-1 h-4 w-4"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                Edit
            </a>
              @else
                
              @endif
               
            </td>  
          
            
                            
        </tr>
        @endforeach

    </tbody>
</table>

<div class="intro-y box mt-5 p-5 ">
    <button class="transition duration-200 border shadow-sm inline-flex items-center justify-center rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed text-xs py-1.5 px-2 bg-primary border-primary text-white dark:border-primary mb-2 mr-1  mb-2 mr-1 inline-block w-50">Approval Workflows - IT Asset</button> 
<ol class="flex items-center w-full p-3 space-x-2 text-sm font-medium text-center text-gray-500 bg-white border border-gray-200 rounded-lg shadow-xs dark:text-gray-400 sm:text-base dark:bg-gray-800 dark:border-gray-700 sm:p-4 sm:space-x-4 rtl:space-x-reverse">
    <li class="flex items-center text-blue-600 dark:text-blue-500 ">
        <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-blue-600 rounded-full shrink-0  bg-dark text-white mr-3 ">
            1
        </span>
        <span class="text-primary">  Requester  </span>     
    </li>
    @php
        $seqIt=2;
    @endphp
    @foreach ($ItpathApproval as $ItpathApproval)       
    <li class="flex items-center">
        <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180 mr-3 text-primary" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4"/>
        </svg>
        <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400  bg-dark text-white mr-3">
            {{ $seqIt++ }}
        </span>
        <span class="text-primary"> {{ $ItpathApproval->approver_name }}   </span>        
    </li>
    @endforeach
</ol>
</div>

<div class="intro-y box mt-5 p-5 ">
    <button class="transition duration-200 border shadow-sm inline-flex items-center justify-center rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed text-xs py-1.5 px-2 bg-primary border-primary text-white dark:border-primary mb-2 mr-1  mb-2 mr-1 inline-block w-50">Approval Workflows - NON IT Asset</button> 
<ol class="flex items-center w-full p-3 space-x-2 text-sm font-medium text-center text-gray-500 bg-white border border-gray-200 rounded-lg shadow-xs dark:text-gray-400 sm:text-base dark:bg-gray-800 dark:border-gray-700 sm:p-4 sm:space-x-4 rtl:space-x-reverse">
    <li class="flex items-center text-blue-600 dark:text-blue-500 ">
        <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-blue-600 rounded-full shrink-0  bg-dark text-white mr-3 ">
            1
        </span>
        <span class="text-primary">  Requester  </span> 
    </li>
    @php
        $seqnonIt=2;
    @endphp
    @foreach ($nonItpathApproval as $nonItpathApproval)       
    <li class="flex items-center">
        <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180 mr-3 text-primary" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4"/>
        </svg>
        <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400  bg-dark text-white mr-3">
            {{ $seqnonIt++ }}
        </span>
      <span class="text-primary">{{ $nonItpathApproval->approver_name }}  </span>        
    </li>
    @endforeach
</ol>
</div>