{{--Edit modal start here--}}
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content text-white" style="background-color:	#DCDCDC;">
      <div class="modal-body" id="attachment-body-content">
        <form id="edit-form" class="form-horizontal" method="POST" action="{{ route('question.update','test')}}">
        	{{ csrf_field() }}
        	{{ method_field('patch') }}
          <div class="card text-white bg-dark mb-0">
            <div class="card-header">
              <div class="text-center">
                <h2 class="m-0">Edit Question</h2>
              </div>
            </div>
            <div class="card-body">
	            <input type="hidden" name="question_id" class="form-control" id="modal-input-id" required>
              	@include('layouts.editQuestionform')
            </div>
                <hr>
              <div class="text-center">
                <button type="submit" class="btn btn-info">Update</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
              </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div> {{-- Edit modal End here--}}