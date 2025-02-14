@section('title', 'Requested CAPEX History')
<table id="example" data-tw-merge="" class="w-full text-left -mt-2 border-separate border-spacing-y-[10px]">
    <thead data-tw-merge="" class="custom-thead">
        <tr data-tw-merge="" class="">
            <th class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0">
                Sl
            </th>
            <th class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0 text-center">
                Action
            </th>
            <th class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0">
                Created Date
            </th>
            <th class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0">
                Request NO
            </th>
            <th class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0">
                Asset Type
            </th>
            <th class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0">
                Asset Name
            </th>
            <th class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0">
                Sanction No
            </th>

            {{-- <th class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0">
                Asset No
            </th> --}}
            <th class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0">
                Waiting Approver
            </th>
            <th class="font-medium px-5 py-3 dark:border-darkmode-300 whitespace-nowrap border-b-0">
                Status
            </th>







        </tr>
    </thead>
    <tbody>
        @foreach ($requestList as $key => $list)
            <tr data-tw-merge="" class="intro-x">
                <td data-tw-merge=""
                    class="px-5 py-3 border-b dark:border-darkmode-300 box w-40 rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                    {{ $key + 1 }}
                </td>
                <td data-tw-merge=""
                    class="px-1 py-3 border-b dark:border-darkmode-300 box  rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                    <a data-tw-merge data-tw-toggle="modal" data-tableid="{{ $list->id }}"  data-tw-target="#header-footer-modal-preview" href="#"
                    class="requestDetails transition duration-200 border shadow-sm inline-flex items-center justify-center py-1 px-1 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary">
                   View </a>
                </td>

                <td data-tw-merge=""
                    class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                    {{ date_dmy($list->request_date) }}
                </td>
                <td data-tw-merge=""
                    class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                    {{ $list->request_no }}
                </td>

                <td data-tw-merge=""
                    class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                    {{ $list->asset_type }}
                </td>
                <td data-tw-merge=""
                    class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                    {{ $list->asset_name }}
                </td>
                <td data-tw-merge=""
                    class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                    {{ $list->sanction_number }}
                </td>
                {{-- <td data-tw-merge=""
                    class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">

                </td> --}}
                <td data-tw-merge=""
                    class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                    @php
                        //pre($list->approvalPathDetails[0]->approver_name);
                    if($list->approval_status != 'A'){
                        if (!empty($list->approvalPathDetails) && isset($list->approvalPathDetails[0]->approver_name)) {
                            echo $list->approvalPathDetails[0]->approver_name;
                        }
                    }
                    @endphp
                </td>
                <td data-tw-merge=""
                    class="px-5 py-3 border-b dark:border-darkmode-300 box rounded-l-none rounded-r-none border-x-0 shadow-[5px_3px_5px_#00000005] first:rounded-l-[0.6rem] first:border-l last:rounded-r-[0.6rem] last:border-r dark:bg-darkmode-600">
                    {{-- {{  $list->approval_status }}  --}}

                    @if ($list->approval_status == 'P')
                            <span style="font-weight:bold;color:orange">    In Process </span>
                    @elseif($list->approval_status == 'A')
                    <span style="font-weight:bold;color:green">    Approved </span>
                    @elseif($list->approval_status == 'C')
                          <span style="font-weight:bold;color:red">    Cancelled </span>
                    @elseif($list->approval_status == 'R')
                            <span style="font-weight:bold;color:red">    Rejected </span>
                    @endif
                </td>






            </tr>
        @endforeach

    </tbody>
</table>



<!-- BEGIN: Modal Toggle -->
{{-- <div class="text-center">
    <a data-tw-merge data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview" href="#"
        class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary">Show
        Modal</a>
</div> --}}
<!-- END: Modal Toggle -->

<!-- BEGIN: Modal Content -->
<div data-tw-backdrop="" aria-hidden="true" tabindex="-1" id="header-footer-modal-preview"
    class="modal group bg-black/60 transition-[visibility,opacity] w-screen h-screen fixed left-0 top-0 [&amp;:not(.show)]:duration-[0s,0.2s] [&amp;:not(.show)]:delay-[0.2s,0s] [&amp;:not(.show)]:invisible [&amp;:not(.show)]:opacity-0 [&amp;.show]:visible [&amp;.show]:opacity-100 [&amp;.show]:duration-[0s,0.4s]">
    <div data-tw-merge
        class="w-[90%] ml-auto h-screen flex flex-col bg-white relative shadow-md transition-[margin-right] duration-[0.6s] -mr-[100%] group-[.show]:mr-0 dark:bg-darkmode-600 sm:w-[460px] sm:w-[600px] lg:w-[900px]">
        <div class="flex items-center px-5 py-3 border-b border-slate-200/60 dark:border-darkmode-400" style="background-color: #1d3885 !important;color: #fff !important;">
            <h2 class="mr-auto text-base font-medium">
                Capex Request Details
            </h2>         
        </div>
        <div data-tw-merge class="p-5 overflow-y-auto" id="model_request_data_details"> </div>
        <div class="px-5 py-2 text-right border-t border-slate-200/60 dark:border-darkmode-400"><button data-tw-merge
                data-tw-dismiss="modal" type="button"
                class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-danger text-slate-500 dark:border-darkmode-100/40 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-secondary/20 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-100/10 mr-1 w-20 mr-1 w-20">Close</button>
            {{-- <button data-tw-merge type="button"
                class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary w-20 w-20">Send</button> --}}
        </div>
    </div>
</div>
<!-- END: Modal Content -->

<script src="{{ asset('assets/js/employee') }}/capex_request.js"></script>


