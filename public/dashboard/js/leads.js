document.addEventListener("DOMContentLoaded", function () {
    const sampleData = [
      {
        id: 1,
        askedBy: "أحمد محمد",
        question: "ما هي الإجراءات القانونية لتأسيس شركة ذات مسؤولية محدودة؟",
        questionDate: "2024-03-15",
        answeredBy: "محمد العبدالله",
        answer: "يتطلب تأسيس شركة ذات مسؤولية محدودة عدة خطوات...",
        answerDate: "2024-03-16",
        specialty: ["القانون التجاري"],
        status: "تمت الإجابة",
        price: 1000,
        type: "عاجل",
        sold: 5,
      },
      {
        id: 2,
        askedBy: "سارة أحمد",
        question: "ما هي حقوقي القانونية في حالة الفصل التعسفي؟",
        questionDate: "2024-03-14",
        answeredBy: null,
        answer: null,
        answerDate: null,
        specialty: ["قانون العمل"],
        status: "قيد الانتظار",
        price: 500,
        type: "متوسط الأهمية",
        sold: 3,
      },
      {
        id: 3,
        askedBy: "علي حسن",
        question: "كيف يمكنني الطعن في قرار المحكمة؟",
        questionDate: "2024-03-12",
        answeredBy: "فاطمة الزهراء",
        answer: "يمكنك الطعن من خلال تقديم استئناف...",
        answerDate: "2024-03-13",
        specialty: ["القانون الجنائي"],
        status: "تمت الإجابة",
        price: 1500,
        type: "عاجل",
        sold: 0,
      },
      {
        id: 4,
        askedBy: "منى سعيد",
        question: "ما هي الإجراءات اللازمة لتسجيل علامة تجارية؟",
        questionDate: "2024-03-10",
        answeredBy: null,
        answer: null,
        answerDate: null,
        specialty: ["قانون الملكية الفكرية"],
        status: "قيد الانتظار",
        price: 800,
        type: "منخفض الأهمية",
        sold: 1,
      },
      {
        id: 5,
        askedBy: "يوسف علي",
        question: "ما هي حقوق المستأجر في حالة الإخلاء؟",
        questionDate: "2024-03-08",
        answeredBy: "علي العبدالله",
        answer: "للمستأجر حقوق معينة...",
        answerDate: "2024-03-09",
        specialty: ["قانون العمل"],
        status: "تمت الإجابة",
        price: 600,
        type: "متوسط الأهمية",
        sold: 2,
      },
      {
        id: 6,
        askedBy: "ليلى محمد",
        question: "كيف يمكنني الحصول على تعويض عن الأضرار؟",
        questionDate: "2024-03-05",
        answeredBy: null,
        answer: null,
        answerDate: null,
        specialty: ["قانون الضرائب"],
        status: "قيد الانتظار",
        price: 1200,
        type: "عاجل",
        sold: 0,
      },
    ];
  
    const loadingSpinner = document.getElementById("loading");
    const totalLeads = document.getElementById("totalLeads");
    const searchInput = document.getElementById("searchInput");
    const tableBody = document.getElementById("tableBody");
    const leadModal = document.getElementById("leadModal");
    const modalContent = document.getElementById("modalContent");
    const closeModal = document.getElementById("closeModal");
    const editModal = document.getElementById("editModal");
    const closeEditModal = document.getElementById("closeEditModal");
    const editForm = document.getElementById("editForm");
    const editQuestion = document.getElementById("editQuestion");
    const editPrice = document.getElementById("editPrice");
    const editType = document.getElementById("editType");
    const editSold = document.getElementById("editSold");
    const editSpecialty = document.getElementById("editSpecialty");
    const cancelEdit = document.getElementById("cancelEdit");
    const deleteModal = document.getElementById("deleteModal");
    const closeDeleteModal = document.getElementById("closeDeleteModal");
    const cancelDelete = document.getElementById("cancelDelete");
    const confirmDeleteBtn = document.getElementById("confirmDelete");
    const toggleSidebar = document.getElementById("toggleSidebar");
    const fullSidebar = document.getElementById("fullSidebar");
    const closeSidebar = document.getElementById("closeSidebar");
    const iconsSidebar = document.getElementById("iconsSidebar");
  
    let data = [];
    let editingLeadId = null;
    let leadToDeleteId = null;
  
    // Simulate loading data
    setTimeout(() => {
      data = sampleData;
      renderTable(data);
      loadingSpinner.classList.add("hidden");
    }, 1000);
  
    // Render table rows
    function renderTable(data) {
      tableBody.innerHTML = data
        .map(
          (lead) => `
          <tr class="border-b">
            <td class="p-2">${lead.id}</td>
            <td class="p-2">${lead.askedBy}</td>
            <td class="p-2">${lead.answeredBy || "لم تتم الإجابة بعد"}</td>
            <td class="p-2">${formatDate(lead.questionDate)}</td>
            <td class="p-2">${formatDate(lead.answerDate)}</td>
            <td class="p-2">
              <div class="bg-blue-50 p-1 rounded text-sm">
                ${lead.specialty.map((spec) => `<div>${spec}</div>`).join("")}
              </div>
            </td>
            <td class="p-2">
              <div class="px-2 py-1 rounded-full text-center text-sm ${
                lead.sold > 0
                  ? "bg-green-100 text-green-800"
                  : "bg-yellow-100 text-yellow-800"
              }">
                ${lead.sold > 0 ? "تم البيع" : "لم يتم البيع بعد"}
              </div>
            </td>
            <td class="p-2">
              <div class="flex gap-2">
                <button
                  onclick="showLeadDetails(${lead.id})"
                  class="flex items-center gap-1 px-3 py-1.5 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors border border-blue-500 rounded-lg"
                >
                  <i class="fas fa-eye"></i> عرض
                </button>
                <button
                  onclick="handleEdit(${lead.id})"
                  class="flex items-center gap-1 px-3 py-1.5 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition-colors border border-yellow-500 rounded-lg"
                >
                  <i class="fas fa-edit"></i> تعديل
                </button>
                <button
                  onclick="handleDelete(${lead.id})"
                  class="flex items-center gap-1 px-3 py-1.5 bg-red-500 text-white rounded-md hover:bg-red-600 transition-colors border border-red-500 rounded-lg"
                >
                  <i class="fas fa-trash"></i> حذف
                </button>
              </div>
            </td>
          </tr>
        `
        )
        .join("");
      totalLeads.textContent = data.length;
    }
  
    // Format date
    function formatDate(date) {
      if (!date) return "لم تتم الإجابة بعد";
      return new Date(date).toLocaleDateString("en-US", {
        year: "numeric",
        month: "2-digit",
        day: "2-digit",
      });
    }
  
    // Show lead details modal
    window.showLeadDetails = function (id) {
      const lead = data.find((lead) => lead.id === id);
      if (lead) {
        modalContent.innerHTML = `
          <div class="space-y-4">
            <div class="bg-blue-50 p-4 rounded-lg">
              <div class="flex items-center gap-2 mb-3">
                <h3 class="text-lg font-semibold text-blue-900">السؤال</h3>
              </div>
              <p class="text-blue-800">${lead.question}</p>
            </div>
            <div class="bg-gray-50 p-4 rounded-lg">
              <div class="flex items-center gap-2 mb-3">
                <h3 class="text-lg font-semibold text-gray-900">السعر</h3>
              </div>
              <p class="text-gray-800">${lead.price || "لم يتم تحديد السعر"}</p>
            </div>
            <div class="bg-gray-50 p-4 rounded-lg">
              <div class="flex items-center gap-2 mb-3">
                <h3 class="text-lg font-semibold text-gray-900">نوع الفرصة</h3>
              </div>
              <p class="text-gray-800">${lead.type || "لم يتم تحديد النوع"}</p>
            </div>
            <div class="bg-gray-50 p-4 rounded-lg">
              <div class="flex items-center gap-2 mb-3">
                <h3 class="text-lg font-semibold text-gray-900">عدد المبيعات</h3>
              </div>
              <p class="text-gray-800">${lead.sold || "لم يتم تحديد العدد"}</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div class="bg-gray-50 p-3 rounded">
                <p class="text-gray-600 mb-1">السائل</p>
                <p class="font-semibold">${lead.askedBy}</p>
              </div>
              <div class="bg-gray-50 p-3 rounded">
                <p class="text-gray-600 mb-1">المجيب</p>
                <p class="font-semibold">${lead.answeredBy || "لا يوجد"}</p>
              </div>
            </div>
            <div class="bg-gray-50 p-3 rounded">
              <p class="text-gray-600 mb-1">التخصص</p>
              <div class="bg-white p-2 rounded shadow-sm">
                ${lead.specialty.map((spec) => `<div>${spec}</div>`).join("")}
              </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div class="bg-gray-50 p-3 rounded">
                <p class="text-gray-600 mb-1">تاريخ الفرصة</p>
                <p class="font-semibold">${formatDate(lead.questionDate)}</p>
              </div>
              <div class="bg-gray-50 p-3 rounded">
                <p class="text-gray-600 mb-1">تاريخ الإجابة</p>
                <p class="font-semibold">${formatDate(lead.answerDate)}</p>
              </div>
            </div>
          </div>
        `;
        leadModal.classList.remove("hidden");
      }
    };
  
    // Close modal
    closeModal.addEventListener("click", () => {
      leadModal.classList.add("hidden");
    });
  
    // Search functionality
    searchInput.addEventListener("input", (e) => {
      const searchText = e.target.value.toLowerCase();
      const filteredData = sampleData.filter((lead) =>
        [
          lead.askedBy,
          lead.question,
          lead.answeredBy || "",
          lead.specialty.join(" "),
          formatDate(lead.questionDate),
          formatDate(lead.answerDate),
        ]
          .join(" ")
          .toLowerCase()
          .includes(searchText)
      );
      renderTable(filteredData);
    });
  
    // Handle Edit
    window.handleEdit = function (id) {
      const lead = data.find((lead) => lead.id === id);
      if (lead) {
        editingLeadId = id;
        editQuestion.value = lead.question;
        editPrice.value = lead.price || "";
        editType.value = lead.type || "";
        editSold.value = lead.sold || "";
        editSpecialty.value = lead.specialty.join(",");
        editModal.classList.remove("hidden");
      }
    };
  
    // Close edit modal
    closeEditModal.addEventListener("click", () => {
      editModal.classList.add("hidden");
    });
  
    cancelEdit.addEventListener("click", () => {
      editModal.classList.add("hidden");
    });
  
    // Submit edit form
    editForm.addEventListener("submit", (e) => {
      e.preventDefault();
      const updatedLead = {
        id: editingLeadId,
        question: editQuestion.value,
        price: editPrice.value,
        type: editType.value,
        sold: editSold.value,
        specialty: editSpecialty.value.split(","),
      };
      data = data.map((item) =>
        item.id === updatedLead.id ? { ...item, ...updatedLead } : item
      );
      renderTable(data);
      editModal.classList.add("hidden");
    });
  
    // Handle Delete
    window.handleDelete = function (id) {
      leadToDeleteId = id;
      deleteModal.classList.remove("hidden");
    };
  
    // Close delete modal
    closeDeleteModal.addEventListener("click", () => {
      deleteModal.classList.add("hidden");
    });
  
    cancelDelete.addEventListener("click", () => {
      deleteModal.classList.add("hidden");
    });
  
    // Confirm delete
    confirmDeleteBtn.addEventListener("click", () => {
      data = data.filter((item) => item.id !== leadToDeleteId);
      renderTable(data);
      deleteModal.classList.add("hidden");
    });
  
    // Sidebar functionality
    toggleSidebar.addEventListener("click", () => {
      fullSidebar.classList.toggle("translate-x-full");
      iconsSidebar.classList.toggle("hidden");
    });
  
    closeSidebar.addEventListener("click", () => {
      fullSidebar.classList.add("translate-x-full");
      iconsSidebar.classList.remove("hidden");
    });
  });