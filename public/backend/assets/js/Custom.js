/** Load All Zila Start**/
/** 
 * 
 * 
 * 
 * Function useCase
 *  _LoadZila(যদি আমি বিভাগ  id দিয়ে দেই তাহলে তার আন্ডারে সকল উপজেলা গুলো লোড হয়ে চলে আসবে , এই জন্য এই ফাংশান টা বানানো হয়েছে )  
 * 
 * 
 * 
 * **/
export function _LoadZila(divisionId, __target_id, getZilaRoute) {
    var url = getZilaRoute.replace(':id', divisionId);

    if (divisionId) {
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $(__target_id).empty();
                $(__target_id).append('<option>---নির্বাচন করুন---</option>');
                $.each(data, function (key, value) {
                    $(__target_id).append('<option value="' + value.id + '">' + value.district_name_bn + '</option>');
                });
            }
        });
    } else {
        $(__target_id).empty();
        $(__target_id).append('<option>---নির্বাচন করুন---</option>');
    }
}



/** Load UpZila Start **/
/** Function useCase _LoadUpzila(যদি আমি জেলার  id দিয়ে দেই তাহলে তার আন্ডারে সকল উপজেলা গুলো লোড হয়ে চলে আসবে , এই জন্য এই ফাংশান টা বানানো হয়েছে ) **/ 
export  function _LoadUpzila(ZilaId, __target_id, getZilaRoute) {
    var url = getZilaRoute.replace(':id', ZilaId);
    if (ZilaId) {
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $(__target_id).empty();
                $(__target_id).append('<option>---নির্বাচন করুন---</option>');
                $.each(data, function (key, value) {
                    $(__target_id).append('<option value="' + value.id + '">' + value.upozila_name_bn + '</option>');
                });
            }
        });
    } else {
        $(__target_id).empty();
        $(__target_id).append('<option>---নির্বাচন করুন---</option>');
    }
}


/** Load Union Start **/
/** Function useCase _LoadUnion(যদি আমি উপজিলা id দিয়ে দেই তাহলে তার আন্ডারে সকল ইউনিয়ন গুলো লোড হয়ে চলে আসবে , এই জন্য এই ফাংশান টা বানানো হয়েছে ) **/
export  function _LoadUnion(UpZilaId, __target_id, getUpZilaRoute) {
    var url = getUpZilaRoute.replace(':id', UpZilaId);
    if (UpZilaId) {
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $(__target_id).empty();
                $(__target_id).append('<option>---নির্বাচন করুন---</option>');
                $.each(data, function (key, value) {
                    $(__target_id).append('<option value="' + value.id + '">' + value.union_name_bn + '</option>');
                });
            }
        });
    } else {
        $(__target_id).empty();
        $(__target_id).append('<option>---নির্বাচন করুন---</option>');
    }
}
/** Start **/
/** Function useCase _LoadPostOffice(যদি আমি Union id দিয়ে দেই তাহলে তার আন্ডারে সকল Post Office গুলো লোড হয়ে চলে আসবে , এই জন্য এই ফাংশান টা বানানো হয়েছে ) **/
export  function _LoadPostOffice(UnionId, __target_id, route) {
    var url = route.replace(':id', UnionId);
    if (UnionId) {
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $(__target_id).empty();
                $(__target_id).append('<option>---নির্বাচন করুন---</option>');
                $.each(data, function (key, value) {
                    $(__target_id).append('<option value="' + value.id + '">' + value.post_office_name_bn + '</option>');
                });
            }
        });
    } else {
        $(__target_id).empty();
        $(__target_id).append('<option>---নির্বাচন করুন---</option>');
    }
}
/** Start **/
/** Function useCase _LoadVillage(যদি আমি Post_office id দিয়ে দেই তাহলে তার আন্ডারে সকল Village গুলো লোড হয়ে চলে আসবে , এই জন্য এই ফাংশান টা বানানো হয়েছে ) **/
export  function _LoadVillage(Post_office_id, __target_id, route) {
    var url = route.replace(':id', Post_office_id);
    if (Post_office_id) {
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $(__target_id).empty();
                $(__target_id).append('<option>---নির্বাচন করুন---</option>');
                $.each(data, function (key, value) {
                    $(__target_id).append('<option value="' + value.id + '">' + value.village_name_bn + '</option>');
                });
            }
        });
    } else {
        $(__target_id).empty();
        $(__target_id).append('<option>---নির্বাচন করুন---</option>');
    }
}

export function _delete(){
    $('#DivdeleteModal form').submit(function(e){
        e.preventDefault();
        /*Get the submit button*/
        var submitBtn =  $('#DivdeleteModal form').find('button[type="submit"]');
    
        /* Save the original button text*/
        var originalBtnText = submitBtn.html();
    
        /*Change button text to loading state*/
        submitBtn.html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="visually-hidden">Loading...</span>`);
    
        var form = $(this);
        var url = form.attr('action');
        var formData = form.serialize();
        /** Use Ajax to send the delete request **/
        $.ajax({
          type:'POST',
          'url':url,
          data: formData,
          success: function (response) {
            if (response.success) {
              $('#DivdeleteModal').modal('hide');
              toastr.success(response.message);
              $('#datatable1').DataTable().ajax.reload( null , false);
            }
          },
    
          error: function (xhr, status, error) {
             /** Handle  errors **/
             toastr.error(xhr.responseText);
          },
          complete: function () {
            submitBtn.html(originalBtnText);
            }
        });
      });
    
}