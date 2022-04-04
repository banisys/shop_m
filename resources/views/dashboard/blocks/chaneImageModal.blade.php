<!-- Modal -->
<div id="ChangeImageModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">تغییر عکس پروفایل</h4>
            </div>
            <div class="modal-body">
                <label for="fileToUpload" class="btn btn-info">انتخاب عکس</label>
                <input type="file" name="fileToUpload" id="fileToUpload" style="display: none;">
                <span id="uploaded_image"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>
            </div>
        </div>

    </div>
</div>

<script>
    $(document).ready(function(){
        $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
    });
        $(document).on('change' , '#fileToUpload' , function(){
            var property = document.getElementById("fileToUpload").files[0];
            var image_name = property.name;
            var image_extension = image_name.split(".").pop().toLowerCase();
            if(jQuery.inArray(image_extension , ['jpg','png','jpeg','gif']) == -1){
                alert("Invalid image file");
            }
            var image_size = property.size;
            if(image_size > 20000000){
                alert("Image size error");
            }else{
                var form_data = new FormData();
                form_data.append("file",property);

                $.ajax({
                    url : "/panel/upload" ,
                    method : "POST" ,
                    data : form_data ,
                    contentType : false ,
                    cache : false ,
                    processData : false ,
                    beforeSend:function(){
                        $("#uploaded_image").html("<label class='text-success'>در حال بارگذاری...</label>");
                    },
                    success:function(data){
                        $("#uploaded_image").html(data);
                    }
                })
            }
        });
    });
</script>
