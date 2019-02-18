{{--Edit modal start here--}}
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content text-white bg-dark" style="background-color:	#DCDCDC;">
      <div class="text-center">
        <h5 class="mt-3">Delete Question</h5><hr>
      </div>
      <div class="modal-body" id="attachment-body-content">
        <form id="delete-form" class="form-horizontal" method="POST" action="{{ route('question.destroy','test')}}">
        	{{ csrf_field() }}
        	{{ method_field('Delete') }}
            <div class="card-body">
              <div class="text-center">
                <p>Are you sure you want to delete this question???</p>
              </div>
	            <input type="hidden" name="question_id" id="modal-delete-id" class="form-control"  required>
            </div>
          <hr>
          <div class="text-center">
	        <button type="submit" class="btn btn-danger">Delete</button>
	        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
	      </div>
        </form>
      </div>
    </div>
  </div>
</div> {{-- Edit modal End here--}}