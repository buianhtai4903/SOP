var btnShow = document.getElementById("btnShow");
var popupForm1 = document.getElementById("popupForm1");
var popupForm_dienthoai = document.getElementById("popupForm_dienthoai");
var popupForm_cusac = document.getElementById("popupForm_cusac");
var CategorySelect = document.getElementById("category");

// Hàm mở popup
function openPopup(popup) {
    popup.style.display = "block";
}

// Hàm đóng popup và reload trang
function closeForm() {
    popupForm1.style.display = "none";
    popupForm_dienthoai.style.display = "none";
    popupForm_cusac.style.display = "none";
    location.reload();
}

// Sự kiện click cho nút "Thêm sản phẩm"
btnShow.onclick = function() {
    openPopup(popupForm1);
};

// Sự kiện onchange cho dropdown danh mục
CategorySelect.onchange = function() {
    // Đặt lại trạng thái hiển thị của cả hai form
    popupForm_dienthoai.style.display = "none"; 
    popupForm_cusac.style.display = "none"; 
    // Kiểm tra giá trị được chọn
    if (this.value === "Điện thoại") { 
        popupForm_dienthoai.style.display = "block"; 
    } 
    else if (this.value === "Củ Sạc") {
        popupForm_cusac.style.display = "block"; 
    }
};



