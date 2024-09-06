<!-- Modal -->
<div class="modal fadeIn" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="deleteModalLabel"></h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="response_status" class="text-info">Delete Success</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button id="c_delete" type="button" class="btn btn-outline-danger">Delete</button>
            </div>
        </div>
    </div>
</div>

{{--update modal--}}
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body justify-content-center">
                <form>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="date">Date:</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="date" placeholder="Enter Date" name="date">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="details">Details:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="details" placeholder="Enter Details"
                                   name="details">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="amount">Amount:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="amount" placeholder="Enter Amount"
                                   name="amount">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="remarks">Remark:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="remarks" placeholder="Remark Here"
                                   name="remarks">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <span id="response_status"></span>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="c_update" type="button" class="btn btn-outline-primary">Update</button>
            </div>
        </div>
    </div>
</div>


{{--nice modal--}}
{{--<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">--}}
{{--<div class="buttons-preview">--}}
{{--    <button class="btn btn-success" data-toggle="modal" data-target="#modal-success">Success</button>--}}
{{--    <button class="btn btn-info" data-toggle="modal" data-target="#modal-info">Info</button>--}}
{{--    <button class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">Danger</button>--}}
{{--    <button class="btn btn-warning" data-toggle="modal" data-target="#modal-warning">Warning</button>--}}
{{--</div>--}}

<!--Success Modal Templates-->
{{--<div id="modal-success" class="modal modal-message modal-success fade" style="display: none;" aria-hidden="true">--}}
{{--    <div class="modal-dialog">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <i class="glyphicon glyphicon-check"></i>--}}
{{--            </div>--}}
{{--            <div class="modal-title">Success</div>--}}
{{--            <div class="modal-body">You have done great!</div>--}}
{{--            <div class="modal-footer">--}}
{{--                <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>--}}
{{--            </div>--}}
{{--        </div> <!-- / .modal-content -->--}}
{{--    </div> <!-- / .modal-dialog -->--}}
{{--</div>--}}
{{--<!--End Success Modal Templates-->--}}
{{--<!--Info Modal Templates-->--}}
{{--<div id="modal-info" class="modal modal-message modal-info fade" style="display: none;" aria-hidden="true">--}}
{{--    <div class="modal-dialog">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <i class="fa fa-envelope"></i>--}}
{{--            </div>--}}
{{--            <div class="modal-title">Alert</div>--}}

{{--            <div class="modal-body">You'vd got mail!</div>--}}
{{--            <div class="modal-footer">--}}
{{--                <button type="button" class="btn btn-info" data-dismiss="modal">OK</button>--}}
{{--            </div>--}}
{{--        </div> <!-- / .modal-content -->--}}
{{--    </div> <!-- / .modal-dialog -->--}}
{{--</div>--}}
{{--<!--End Info Modal Templates-->--}}
{{--<!--Danger Modal Templates-->--}}
{{--<div id="modal-danger" class="modal modal-message modal-danger fade" style="display: none;" aria-hidden="true">--}}
{{--    <div class="modal-dialog">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <i class="glyphicon glyphicon-fire"></i>--}}
{{--            </div>--}}
{{--            <div class="modal-title">Alert</div>--}}

{{--            <div class="modal-body">You'vd done bad!</div>--}}
{{--            <div class="modal-footer">--}}
{{--                <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>--}}
{{--            </div>--}}
{{--        </div> <!-- / .modal-content -->--}}
{{--    </div> <!-- / .modal-dialog -->--}}
{{--</div>--}}
{{--<!--End Danger Modal Templates-->--}}
{{--<!--Danger Modal Templates-->--}}
{{--<div id="modal-warning" class="modal modal-message modal-warning fade" style="display: none;" aria-hidden="true">--}}
{{--    <div class="modal-dialog">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <i class="fa fa-warning"></i>--}}
{{--            </div>--}}
{{--            <div class="modal-title">Warning</div>--}}

{{--            <div class="modal-body">Is something wrong?</div>--}}
{{--            <div class="modal-footer">--}}
{{--                <button type="button" class="btn btn-warning" data-dismiss="modal">OK</button>--}}
{{--            </div>--}}
{{--        </div> <!-- / .modal-content -->--}}
{{--    </div> <!-- / .modal-dialog -->--}}
{{--</div>--}}
<!--End Danger Modal Templates-->
{{--nice modal end--}}
