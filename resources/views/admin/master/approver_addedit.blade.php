
<form name="dataForm" id="dataForm">
    @csrf
    <input type="hidden" name="id" id="id" value="{{ $id }}">
    <input type="hidden" name="mode" id="mode" value="{{ $mode }}">
<div class="mt-5 grid grid-cols-12 gap-4 gap-y-5">




    <x-input-component column="col-span-12 sm:col-span-12" type="text" label="Approver *" name="approver_name"
    id="approver_name" class="" placeholder="Enter Approver Name"
    value="{{ getEditData($mode, $editData, 'approver_name') }}"  />  

    
    <x-select-component :data="$employeeList" arraykey="emp_no" arrayValue="select_text" column="col-span-12 sm:col-span-12"
    label="Approver Employee Code *" name="emp_code" id="emp_code" class="" placeholder="Select Employee"
    value="{{ getEditData($mode, $editData, 'emp_code') }}" />

    
    
</div>
<div class="mt-2 text-success" id="success_msg"> </div>
<br>
   <!-- BEGIN: Slide Over Footer -->
   <div class="flex float-end mt-4 px-5 py-3 text-right ">
    <button data-tw-merge="" data-tw-dismiss="modal" type="button" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-secondary text-slate-500 dark:border-darkmode-100/40 dark:text-slate-300 [&:hover:not(:disabled)]:bg-secondary/20 [&:hover:not(:disabled)]:dark:bg-darkmode-100/10 w-20 mr-1">Cancel</button>
    <button data-tw-merge="" type="submit" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary w-20" id="savebtn">Save</button>
</div>

</form>
