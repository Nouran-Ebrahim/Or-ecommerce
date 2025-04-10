(function () {
    /* ========= sidebar toggle ======== */
    const sidebarNavWrapper = document.querySelector(".sidebar-nav-wrapper");
    const mainWrapper = document.querySelector(".main-wrapper");
    const menuToggleButton = document.querySelector("#menu-toggle");
    const menuToggleButtonIcon = document.querySelector("#menu-toggle i");
    const overlay = document.querySelector(".overlay");

    menuToggleButton.addEventListener("click", () => {
        sidebarNavWrapper.classList.toggle("active");
        overlay.classList.add("active");
        mainWrapper.classList.toggle("active");

        if (document.body.clientWidth > 1200) {
            if (menuToggleButtonIcon.classList.contains("lni-close")) {
                menuToggleButtonIcon.classList.remove("lni-close");
                menuToggleButtonIcon.classList.add("lni-menu");
            } else {
                menuToggleButtonIcon.classList.remove("lni-menu");
                menuToggleButtonIcon.classList.add("lni-close");
            }
        } else {
            if (menuToggleButtonIcon.classList.contains("lni-close")) {
                menuToggleButtonIcon.classList.remove("lni-close");
                menuToggleButtonIcon.classList.add("lni-menu");
            }
        }
    });
    overlay.addEventListener("click", () => {
        sidebarNavWrapper.classList.remove("active");
        overlay.classList.remove("active");
        mainWrapper.classList.remove("active");
    });
})();
$(document).on("click", ".show_confirm", function () {
    var form = $(this).closest("form");
    swal({
        title: "Confirm Delete",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: form.attr('action'),
                type: form.find("[name='_method']").val(),
                data: {
                    _token: $('meta[name="csrf_token"]').attr('content'),
                }
            });
            form.parent().parent().remove();
        }
    });
});

$(document).ready(function () {
    tinymce.init({
        selector : "textarea:not(.mceNoEditor)",
        plugins: "advlist autolink lists link image charmap preview anchor pagebreak",
        toolbar_mode: "floating",
        toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
    });
});


$(document).on("click", "#ToggleSelectAll", function () {
    if( $('#ToggleSelectAll').is(':checked')){
        $('.DTcheckbox').prop('checked', true);
    }else{
        $('.DTcheckbox').prop('checked', false);
    }

    if($('.DTcheckbox:checkbox:checked').length > 0 ){
        $('#DeleteSelected').attr('disabled',false);
    }else{
        $('#DeleteSelected').attr('disabled',true);
    }
});

$(document).on("change", ".DTcheckbox", function () {
    if($('.DTcheckbox:checkbox:checked').length > 0 ){
        if ( $('.DTcheckbox:checkbox:checked').length  <  $('.DTcheckbox').length) {
            $('#ToggleSelectAll').prop('checked', false);
        }else{
            $('#ToggleSelectAll').prop('checked', true)
        }
        $('#DeleteSelected').attr('disabled',false);
    }else{
        $('#ToggleSelectAll').prop('checked', false);
        $('#DeleteSelected').attr('disabled',true);
    }
});


function dragNdrop(event) {
    var name = document.getElementById('uploadFile').files[0].name
    $('#DargTxt').html(name.slice(0, 25));
}
function drag() {
    document.getElementById('uploadFile').parentNode.className = 'draging dragBox';
    var name = document.getElementById('uploadFile').files[0].name
    $('#DargTxt').html(name.slice(0, 25));
}
function drop() {
    document.getElementById('uploadFile').parentNode.className = 'dragBox';
    var name = document.getElementById('uploadFile').files[0].name
    $('#DargTxt').html(name.slice(0, 25));
}


$( document ).ajaxComplete(function() {
    DataLabel();
});
$(document).ready(function() {
    DataLabel();
});
  
function DataLabel(){
     $('table').each(
        function() {
          var titles;
          titles = [];
          $('thead th', this).each(function() {
            titles.push($(this).text());
          });
          $('tbody tr', this).each(function() {
            $('td', this).each(function(index) {
              $(this).attr('data-label', titles[index]);
            });
          });
    });
}

$(".row_position").sortable({
    stop: function () {
        var positions = new Array();
        var ids = new Array();
        $(this).find("tr").each(function () {
            positions.push($(this).attr("data-position"));
            ids.push($(this).attr("data-id"));
        });
        $.ajax({
            url: "/reorder",
            type: 'POST',
            data: {
                _token: $('meta[name="csrf_token"]').attr('content'),
                ids: ids,
                positions: positions.sort(),
                table: $(this).attr("data-table")
            }
        });
    }
})

function toggleswitch(id, table, column_name = 'status', checkbox = 'checkbox') {  
    $.ajax({
        type: "POST"
        , url: "/switch"
        , data: {
            _token: $('meta[name="csrf_token"]').attr('content')
            , id: id
            , column_name: column_name
            , table: table
        }
        , dataType: 'text'
        , cache: false
        , success: function (checked) {
            checked = JSON.parse(checked);
            $('#' + checkbox + id).prop('checked', checked == 1);
        }
        , error: function (xhr, status, errorThrown) {
            swal({ title: "Error", icon: "warning", buttons: true, dangerMode: true });
        }
    });
}
function DeleteSelected(table,id = 0) {
    var ids = [];
    if(id > 0)
        ids.push(id);
    else{
        $('input:checkbox[class="DTcheckbox"]:checked').each(function() {
            ids.push($(this).attr('value'));
        });
    }
    swal({title: "Delete", icon: "warning", buttons: true, dangerMode: true}).then((willchagestatus) => {
        if (willchagestatus) {
            $.ajax({
                type: "POST"
                , url: "/removeids"
                , data: {
                    _token: $('meta[name="csrf_token"]').attr('content')
                    , ids: ids
                    , table: table
                , }
                , dataType: 'text'
                , cache: false
                , success: function(result) {
                    if (result)
                        location.reload();
                    else
                        swal({title: "Coudn't delete!", icon: "error", buttons: true, dangerMode: true});
                }
                , error: function(xhr, status, errorThrown) {
                    swal({title: "Error", icon: "warning", buttons: true, dangerMode: true});
                }
            });
        }
    });
}