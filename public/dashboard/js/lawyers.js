

   // دالة عرض التفاصيل
   function showClientDetails(id) {
    const clientModal = document.getElementById(`lawyerModal${id}`);
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
    const clientModal = document.getElementById(`lawyerModal${id}`);
    if (clientModal) {
        clientModal.classList.add('hidden'); // إخفاء الـ Modal
    }
}

// دالة لإرسال الـ ID إلى الخادم (اختياري)
function sendIdToServer(id) {
    // هنا يمكنك إرسال البيانات إلى الخادم باستخدام fetch أو axios
    console.log("إرسال الـ ID إلى الخادم: ", id);
}



// Sidebar functionality
document.addEventListener("DOMContentLoaded", function() {
    const sidebar = document.getElementById("sidebar");
    const toggleSidebar = document.getElementById("toggleSidebar");
    const closeSidebar = document.getElementById("closeSidebar");

    // Toggle sidebar on button click
    toggleSidebar.addEventListener("click", function() {
        sidebar.classList.toggle("translate-x-full");
    });

    // Close sidebar on close button click
    closeSidebar.addEventListener("click", function() {
        sidebar.classList.add("translate-x-full");
    });

    // Close sidebar when clicking outside of it
    document.addEventListener("click", function(event) {
        if (
            !sidebar.contains(event.target) &&
            !toggleSidebar.contains(event.target)
        ) {
            sidebar.classList.add("translate-x-full");
        }
    });
});


// search
$(document).ready(function(){
    // حدث عند كتابة شيء في خانة البحث
    $('#search').on('keyup', function() {
        var value = $(this).val().toLowerCase();  // الحصول على النص المدخل وتحويله لحروف صغيرة
        $('#Table tbody tr').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)  // تصفية الصفوف بناءً على النص
        });
    });
});
