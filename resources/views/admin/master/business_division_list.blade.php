
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.tailwindcss.css"> --}}
@section('title', 'Business Division')
<div class="mt-5 grid grid-cols-12 ">
    <div class="intro-y col-span-12 mt-2 flex flex-wrap items-center sm:flex-nowrap">
            <div class="text-center">
            <a data-tw-merge data-tw-toggle="modal" data-mode="Add" data-tableid="0" data-tw-target="#header-footer-slide-over-preview" href="#" class="leftSideModel transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="plus" class="lucide lucide-plus stroke-1.5 h-4 w-4"><path d="M5 12h14"></path><path d="M12 5v14"></path></svg>Add </a>
        </div>
    </div>
    <div class="intro-y col-span-12 overflow-auto lg:overflow-scroll marginTopMinus40" id="table_data">
    </div>
</div>
<script src="{{ asset('assets/js/admin') }}/business_division.js"></script>


