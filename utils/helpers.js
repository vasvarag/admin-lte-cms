$(document).on("click", ".editModalButton", function (e) {

	e.preventDefault();

	var _self = $(this);

	var id 				= _self.data('id');
	var name 			= _self.data('name');
	var entry_date 		= _self.data('entry_date');
	var description 	= _self.data('description');
	var intro 			= _self.data('intro');
	var subcategory 	= _self.data('subcategory');
	var cover_img 		= _self.data('cover_img');
	var featured_img 	= _self.data('featured_img');
	var alt_tag 		= _self.data('alt_tag');
	var isActive 		= _self.data('isActive');

	$("#editProductModal form")[0].action = '/products/' + id;
	$("#editProductModal #id").val(id);
	$("#editProductModal #name").val(name);
	$("#editProductModal #entry_date").val(entry_date);
	$("#editProductModal #description").val(description);
	$("#editProductModal #intro").val(intro);
	$("#editProductModal #subcategory").val(subcategory);
	$("#editProductModal #cover_img").val(cover_img);
	$("#editProductModal #featured_img").val(featured_img);
	$("#editProductModal #alt_tag").val(alt_tag);
	$("#editProductModal #isActive").val(isActive);

console.log(intro);
	$(_self.attr('href')).modal('show');
});



// $(document).on("click", ".editModalButton", function (e) {

// 	e.preventDefault();

// 	var _self = $(this);

// 	var myId = _self.data('id');
// 	$("#id").val(myId);
// 	$("#editProductModal form")[0].action = '/products/' + myId;



// // console.log($("#id"));
// 	$(_self.attr('href')).modal('show');
// });

