
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

   // دالة عرض التفاصيل
   function showClientDetails(id) {
    const clientModal = document.getElementById(`clientModal${id}`);
    const modalContent = document.getElementById(`modalContent${id}`);

    // إظهار الـ Modal فقط للـ client الذي تم اختياره
    if (clientModal) {
        clientModal.classList.remove('hidden');
    }

    // إرسال الـ ID إلى الخادم (يمكنك استخدام fetch أو axios هنا)
    sendIdToServer(id);
}

// دالة إغلاق الـ Modal
function closeModal(id) {
    const clientModal = document.getElementById(`clientModal${id}`);
    if (clientModal) {
        clientModal.classList.add('hidden'); // إخفاء الـ Modal
    }
}

// دالة لإرسال الـ ID إلى الخادم (اختياري)
function sendIdToServer(id) {
    // هنا يمكنك إرسال البيانات إلى الخادم باستخدام fetch أو axios
    console.log("إرسال الـ ID إلى الخادم: ", id);
}



$(document).ready(function(){
    // حدث عند كتابة شيء في خانة البحث
    $('#search').on('keyup', function() {
        var value = $(this).val().toLowerCase();  // الحصول على النص المدخل وتحويله لحروف صغيرة
        $('#myTable tbody tr').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)  // تصفية الصفوف بناءً على النص
        });
    });
});
