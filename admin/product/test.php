<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Product Form</title>
</head>
<body>

    <label for="category">Danh mục:</label>
    <select name="category" id="category" onchange="toggleForms()">
        <option value="">Chọn loại</option>
        <option value="Điện thoại">Điện thoại</option>
        <option value="Củ Sạc">Củ Sạc</option>
    </select>

    <div class="form-cusac" id="popupForm_cusac" style="display: none;">
        <p>Các trường cho củ sạc</p>
        <!-- Các trường cho củ sạc -->
    </div>

    <div class="form-dienthoai" id="popupForm_dienthoai" style="display: none;">
        <p>Các trường cho điện thoại</p>
        <!-- Các trường cho điện thoại -->
    </div>

    <script>
        function toggleForms() {
            var category = document.getElementById("category").value;
            console.log("Category selected:", category); // Thêm log để kiểm tra

            // Ẩn cả hai form
            document.getElementById("popupForm_cusac").style.display = "none";
            document.getElementById("popupForm_dienthoai").style.display = "none";

            // Hiển thị form tương ứng
            if (category === "Điện thoại") {
                document.getElementById("popupForm_dienthoai").style.display = "block";
            } else if (category === "Củ Sạc") {
                document.getElementById("popupForm_cusac").style.display = "block";
            }
        }
    </script>
</body>
</html>
