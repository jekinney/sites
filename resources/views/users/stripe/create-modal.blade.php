<div class="modal fade" id="create-subscription-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="{{ route( 'stripe.store' ) }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add a Subscription</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                         
                    <div class="form-group">
                        <label for="nickname">Name</label>
                        <input type="text" name="nickname" id="nickname" value="{{ old( 'nickname' ) }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="interval">Interval</label>
                        <select name="interval" id="interval" class="custom-select">
                            <option value="month" @if( old('interval') !== 'year' ) selected @endif >Monthly</option>
                            <option value="year" @if( old('interval') == 'year' ) selected @endif>Yearly</option>
                        </select>
                    </div>  

                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">$</span>
                            </div>
                            <input type="text" name="amount" id="amount" class="form-control">
                        </div>
                    </div> 

                    <div class="form-group">
                        <label for="currency">Currency</label>
                         <select name="interval" id="interval" class="custom-select">
                            <option value="usd" selected>USD</option>
                        </select>
                    </div> 

                    <div class="row">
                        
                        <div class="col">
                            <label for="publish_at">Publish Date</label>
                            <input type="text" name="publish_at" id="publish_at" value="{{ old( 'publish_at' ) }}" class="form-control">
                        </div>

                        <div class="col">
                            <label for="expires_at">expires Date</label>
                            <input type="text" name="expires_at" id="expires_at" value="{{ old( 'publish_at' ) }}" class="form-control">
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>