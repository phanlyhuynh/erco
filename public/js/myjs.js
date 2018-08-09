$(document).on('click', '#confirm_delete', function () {
        return confirm('Bạn chắc chắn muốn xóa?');
});
function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#product-thumbnail-show').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
$("#product-thumbnail").change(function(){
    readURL(this);
});

function readURLthumbnailedit(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#thumnail-edit-show').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#thumbnail-edit").change(function(){
    readURLthumbnailedit(this);
});

function readURLpost(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#post-thumbnail-show').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#post-thumbnail").change(function(){
    readURLpost(this);
});

$("#uploadFile").change(function(){
    $('#image_preview').html("");
    var total_file=document.getElementById("uploadFile").files.length;


    for(var i=0;i<total_file;i++)
    {
        $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");
    }
});

//ajax
function loadingBrand() {
    $('#load .pagination a').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            type: "GET",
            url: $(this).attr('href'),
            success: function (data) {
                $('#load').html(data);
                loadingBrand();
            },
            error: function (xhr) {
                console.log(xhr.message);
            }
        });
    });
}

function loadingProduct() {
    $('#load_products .pagination a').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            type: "GET",
            url: $(this).attr('href'),
            success: function (data) {
                $('#load_products').html(data);
                loadingProduct();
            },
            error: function (xhr) {
                console.log(xhr.message);
            }
        });
    });
}

function loadingOrder() {
    $('#load_orders .pagination a').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            type: "GET",
            url: $(this).attr('href'),
            success: function (data) {
                $('#load_orders').html(data);
                loadingOrder();
            },
            error: function (xhr) {
                console.log(xhr.message);
            }
        });
    });
}

$(document).ready(function(){
    loadingBrand();
    loadingProduct();
    loadingOrder();
});