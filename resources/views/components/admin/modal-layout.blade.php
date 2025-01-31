<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog {{ $dialogclass }}">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="header_title">{{ $title }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>      
         <div class="modal-body {{ $bodyclass }}" id="bodyContent"> 
            {{ $slot }}
         </div>
        <!--/ App Wizard -->
      </div>
    </div>
  </div>
  <!--/ Create App Modal -->
  