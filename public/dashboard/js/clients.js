
// Sidebar functionality
document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.getElementById("sidebar");
    const toggleSidebar = document.getElementById("toggleSidebar");
    const closeSidebar = document.getElementById("closeSidebar");

    // Toggle sidebar on button click
    toggleSidebar.addEventListener("click", function () {
        sidebar.classList.toggle("translate-x-full");
    });

    // Close sidebar on close button click
    closeSidebar.addEventListener("click", function () {
        sidebar.classList.add("translate-x-full");
    });

    // Close sidebar when clicking outside of it
    document.addEventListener("click", function (event) {
        if (
            !sidebar.contains(event.target) &&
            !toggleSidebar.contains(event.target)
        ) {
            sidebar.classList.add("translate-x-full");
        }
    });
});

// تعريف دالة تغيير الحالة
function toggleStatus(id) {
    const statusText = document.getElementById(`statusText-${id}`);
    const buttonIcon = document.getElementById(`buttonIcon-${id}`);
    const button = document.getElementById(`toggleButton-${id}`);

    // التبديل بين النص والحالة
    if (statusText.textContent === "نشط") {
        statusText.textContent = "غير نشط"; // تغيير النص إلى غير نشط
        button.classList.remove("bg-green-500"); // إزالة اللون الأخضر
        button.classList.add("bg-gray-200"); // إضافة اللون الرمادي
        buttonIcon.style.right = "0"; // تحريك الزر إلى الجهة اليسرى
        statusText.classList.remove("text-white"); // تغيير النص إلى أسود
        statusText.classList.add("text-gray-700");
    } else {
        statusText.textContent = "نشط"; // إعادة النص إلى نشط
        button.classList.remove("bg-gray-200"); // إزالة اللون الرمادي
        button.classList.add("bg-green-500"); // إضافة اللون الأخضر
        buttonIcon.style.right = "1"; // إعادة الزر إلى الجهة اليمنى
        statusText.classList.remove("text-gray-700"); // تغيير النص إلى أبيض
        statusText.classList.add("text-white");
    }
}

