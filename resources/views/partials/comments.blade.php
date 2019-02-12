<div class="row">
    <div class="col-sm-12">
        <h4>Recent Comments</h4>
    </div><!-- /col-sm-12 -->
</div><!-- /row -->

        @foreach( $comments as $comment)
        <div class="row">
          
            <div class="col-sm-1 col-md-1 col-lg-1">
              <div class="thumbnail">
                <img class="img-fluid" src="https://static.thenounproject.com/png/17241-200.png">
              </div><!-- /thumbnail -->
            </div><!-- /col-sm-1 -->

            <div class="col-sm-11 col-md-11 col-lg-11">
              <div class="panel panel-default">

                <div class="panel-heading">
                  <strong>
                    <a href="users/{{ $comment->user->id }}">{{ $comment->user->name }}</a>
                  </strong>
                </div>

                <div class="panel-heading">
                  <p><small>Commented on - {{ $comment->created_at }}</small></p> 
                </div>

                <div>
                  <article>{{ $comment->body }}</article>
                </div>

                <div class="panel-body">
                  <strong>Proof: </strong> {{ $comment->url }}
                </div><!-- /panel-body -->

              </div><!-- /panel panel-default -->
            </div><!-- /col -->
          
        </div><!-- /row -->
        <hr>
        @endforeach