<div class="modal fade image-cropper" id="imageCropperModal" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="imageCropperModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addindustyModal">Profile Image</h5>
                <button type="button" class="close" data-dismiss="modal" onclick="closeModal()" aria-label="Close">
                    <em class="icon-close"></em>
                </button>
            </div>
            <div class="modal-body">
                <div id="image_container" class="height">
                    <img alt="image" src="" id="crop_image" class="img-responsive" height="auto" width="100%" />
                </div>
                <input type="hidden" id="imageBaseCode">
                <input type="hidden" id="image_type" value="">
                <div class="clearfix"></div>
                <div class="progress progress123 mt-3" style="display: none;">
                    <div class="progress-bar bar bar123 bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%"></div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
            <div class="col-4 col-sm-2 col-lg-2 col-md-2"></div>
                <div class="col-6 col-sm-5 col-lg-5 col-md-5">
                   <button type="button" class="btn ripple-effect-dark save-img-croper btn-primary btn-md text-uppercase mr-2" id="cropButton">Save</button>
                </div>
               
                <div class="col-6 col-sm-5 col-lg-5 col-md-5">
                <button type="button" class="btn  cancel-img-croper ripple-effect-dark btn-light btn-md text-uppercase" onclick="closeModal()" data-dismiss="modal">Cancel</button>
               </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function closeModal() {
        $('#upload_image').val("");
        $('#crop_image').attr('src', '');
        $('#imageBaseCode').val('');
        $("#imageCropperModal").modal("hide");
    }
    $("#cropButton").on('click', (function(e) {
        var $imageCover = $("#crop_image");
        var $type = $("#type").val();
        var $imageBaseCode = $("#imageBaseCode").val();

        $imageCover.val();
        var firstimage = document.getElementById("previewImage");

        $value_image=[];
        if (firstimage.src == '') {
            $('#previewImage').attr('src', $imageCover.cropper('getCroppedCanvas').toDataURL());
            $('#previewImage').attr('height','100px');
            $('#previewImage').attr('width','100px');
        } else {
            $('#previewImage1').attr('src', $imageCover.cropper('getCroppedCanvas').toDataURL());
            $('#previewImage1').attr('height','100px');
            $('#previewImage1').attr('width','100px');
        }
        // $('#previewImage').attr('src', $imageCover.cropper('getCroppedCanvas').toDataURL());
        $image_data=$('#imagedata').val($imageCover.cropper('getCroppedCanvas').toDataURL());

        // console.log("image data ",$image_data)
        $("#imageCropperModal").modal("hide");
        return true;
    }));
</script>