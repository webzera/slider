<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addSliderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Slider</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form wire:submit.prevent="store" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
            <div class="form-group">
                <label for="slider_name">Name</label>
                <input type="text" name="slider_name" wire:model="slider_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="caption">Caption</label>
                <input type="text" name="caption" wire:model="caption" class="form-control">
            </div>
            <div class="form-group">
                <label for="sub_caption">Sub Caption</label>
                <input type="text" name="sub_caption" wire:model="sub_caption" class="form-control">
            </div>

            <div class="form-group">
                <label for="slider_image">Image</label>
                <input type="text" name="slider_image" wire:model="slider_image" class="form-control">
            </div>

            <div class="form-group">
                <label for="link_url">Link Address</label>
                <input type="text" name="link_url" wire:model="link_url" class="form-control">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Slider</button>
      </div>
      </form>
    </div>
  </div>
</div>