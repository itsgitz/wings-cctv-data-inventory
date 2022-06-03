<div class="shadow-md p-3">
   <button class="btn btn-secondary btn-sm shadow fw-bold"
        @if (!isset($cctv->zone_map)) disabled @endif
    data-bs-toggle="modal" data-bs-target="#showZoneMap">
      Tampilkan Layout CCTV (zone map)
   </button>

    <!-- Modal -->
    <div class="modal fade" id="showZoneMap" tabindex="-1" aria-labelledby="Zone Map" aria-hidden="true">
      <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Layout CCTV (zone map)</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="text-center">
                <img src="{{ $cctv->zone_map }}" alt="zone map" class="img-fluid">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm shadow" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
</div>
